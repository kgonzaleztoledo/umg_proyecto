<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Employee;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\PersonalInformacion;

use App\Models\Puesto as Puestos;
use App\Models\PersonalDepartamento as PersonalDepartamentos;

use App\Models\FamiliaInformacion as Familiares;

use App\Models\department;
use App\Models\User;
use App\Models\module_permission;
use Session;
use Auth;

class EmpleadoController extends Controller
{
    // all employee card view
    public function tarjetaTodosEmpleado(Request $request)
    {

        $departamentos   = DB::table('personal_departamentos')
        ->orderBy('nombre', 'asc')
        ->get();
        $puestos   = DB::table('puestos')
        ->orderBy('nombre', 'asc')
        ->get();


        $users = DB::table('users')
                    ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
                    ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
                    ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
                    ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
                    ->select('users.*',
                             'empleados.fecha_inicio_laboral',
                             'empleados.genero',
                             'empleados.salario',
                             'empleados.tipo_contrato',
                             'empleados.tipo_pago',
                             'empresas.nombre as empresa',
                             'perfil_informacion.departamento',
                             'perfil_informacion.puesto_designado',
                             'perfil_informacion.direccion'
                             )
                    ->get();

         //    dd($users);

        $userList = DB::table('users')
                        ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
                        ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
                        ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
                        ->select(
                            'users.id',
                            'users.user_id',
                            'empresas.sku_empresa',
                            'users.nombre as nombre_usuario',
                            'users.email',
                            'personal_informacion.cui_dpi',
                            'personal_informacion.no_cuenta',
                            'personal_informacion.tipo_cuenta',
                            'perfil_informacion.nombre_completo',
                            'perfil_informacion.departamento',
                            'perfil_informacion.puesto_designado',
                            'perfil_informacion.genero',
                            'perfil_informacion.telefono_movil',

                            'perfil_informacion.direccion',
                            'empresas.nombre as nombre_empresa'
                            )
                        ->get();

           //  dd($userList);
    //    $permission_lists = DB::table('permission_lists')->get();

        return view('form.todosempleadocard',compact('users','userList','departamentos','puestos'));
    }
    // all employee list
    public function listaTodosEmpleado()
    {
        $users = DB::table('users')
                    ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
                    ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
                    ->select(
                        'users.*',
                        'empleados.fecha_inicio_laboral',
                        'employees.genero',
                          'empresas.nombre as empresa')
                    ->get();

       // CONDICION SI ES SUPERAMDIN O ADMIN
       if (Auth::user()->nombre_rol=='Admin' || Auth::user()->nombre_rol=='Super Admin'  ){
        $userList = DB::table('users')->get();
       }
       //FIN DE CONDICION
       else{
        $user_id1 = Auth::user()->user_id;

        $userList = DB::table('users')
                        ->where('user_id','=',$user_id1)
                        ->get();
       }
        $permission_lists = DB::table('permission_lists')->get();

        return view('form.empleadolistado',compact('users','userList','permission_lists'));
    }

    // save data employee
    public function saveEmpleadoRecord(Request $request)
    {


 //dd($request);

                     $request->validate([
                        'cui_dpi'        => 'required',
                     'nombre_empleado'        => 'required|string|max:255',
                     'salario'        => 'required'
                        ]);

        DB::beginTransaction();
        try{

            $empleados = Empleado::where('email', '=',$request->email)->first();
            if ($empleados === null)
            {

                $empleado = new Empleado;
                $empleado->user_id         = $request->user_id;
                $empleado->empleado_id        = $request->empleado_id;
                $empleado->sku_empresa   = $request->sku_empresa;
                $empleado->nombre_empleado       = $request->nombre_empleado;

                $empleado->cui_dpi       = $request->cui_dpi;

                $empleado->email  = $request->email;
                $empleado->genero      = $request->genero;
                $empleado->no_cuenta      = $request->no_cuenta;
                $empleado->tipo_cuenta      = $request->tipo_cuenta;
                $empleado->departamento      = $request->departamento;

                $empleado->puesto    =$request->puesto;
                $empleado->direccion      = $request->direccion;
                $empleado->celular      = $request->celular;
                $empleado->fecha_inicio_laboral      = $request->fecha_inicio_laboral;
                $empleado->tipo_contrato      = $request->tipo_contrato;
                $empleado->tipo_pago      = $request->tipo_pago;
                $empleado->salario      = $request->salario;
                $empleado->save();

                DB::commit();
                Toastr::success('Nuevo empleada agregado con éxito :)','Success');
                return redirect()->route('todos/empleados/card');
            } else {
                DB::rollback();
                Toastr::error('Empleado ya Registrado por favor Validar Acción :(','Error');
                return redirect()->route('todos/empleados/card');
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Empleado ya  Registrado por favor Validar Acción :(','Error');
            return redirect()->route('todos/empleados/card');
        }
    }
    // view edit record
    public function viewRecord($employee_id)
    {


        $employees = DB::table('empleados')->where('empleado_id',$employee_id)->get();
        return view('form.edit.editemployee',compact('employees'));
    }
    // update record employee
    public function updateRecord( Request $request)
    {
        DB::beginTransaction();
        try{
            // update table Employee
            $updateEmployee = [
                'id'=>$request->id,
                'name'=>$request->name,
                'email'=>$request->email,
                'birth_date'=>$request->birth_date,
                'gender'=>$request->gender,
                'employee_id'=>$request->employee_id,
                'company'=>$request->company,
            ];
            // update table user
            $updateUser = [
                'id'=>$request->id,
                'name'=>$request->name,
                'email'=>$request->email,
            ];

            // update table module_permissions
            for($i=0;$i<count($request->id_permission);$i++)
            {
                $UpdateModule_permissions = [
                    'employee_id' => $request->employee_id,
                    'module_permission' => $request->permission[$i],
                    'id'                => $request->id_permission[$i],
                    'read'              => $request->read[$i],
                    'write'             => $request->write[$i],
                    'create'            => $request->create[$i],
                    'delete'            => $request->delete[$i],
                    'import'            => $request->import[$i],
                    'export'            => $request->export[$i],
                ];
                module_permission::where('id',$request->id_permission[$i])->update($UpdateModule_permissions);
            }

            User::where('id',$request->id)->update($updateUser);
            Empleado::where('id',$request->id)->update($updateEmployee);

            DB::commit();
            Toastr::success('updated record successfully :)','Success');
            return redirect()->route('all/employee/card');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('updated record fail :)','Error');
            return redirect()->back();
        }
    }
    // delete record
    public function deleteRecord($empleado_id)
    {
      //  dd($empleado_id);
        DB::beginTransaction();
        try{

            Empleado::where('empleado_id',$empleado_id)->delete();
         //   module_permission::where('employee_id',$employee_id)->delete();

            DB::commit();
            Toastr::success('Registro elimimado exitosamente:)','Success');
            return redirect()->route('todos/empleados/card');

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Error al eliminar registro :)','Error');
            return redirect()->back();
        }
    }
    // employee search
    public function empleadoSearch(Request $request)
    {

        $departamentos   = DB::table('personal_departamentos')
        ->orderBy('nombre', 'asc')
        ->get();
        $puestos   = DB::table('puestos')
        ->orderBy('nombre', 'asc')
        ->get();

        $users = DB::table('users')
                    ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
                    ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
                    ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
                    ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
                    ->select('users.*',
                            'empleados.fecha_inicio_laboral',
                            'empleados.genero',
                            'empleados.tipo_contrato',
                            'empleados.tipo_pago',
                            'empleados.salario',
                            'empresas.nombre as empresa',
                            'perfil_informacion.departamento',
                            'perfil_informacion.puesto_designado',
                            'perfil_informacion.direccion'
                            )
                    ->get();

               // dd($users);



        $userList = DB::table('users')
                        ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
                        ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
                        ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
                        ->select(
                            'users.id',
                            'users.user_id',
                            'empresas.sku_empresa',
                            'users.nombre as nombre_usuario',
                            'users.email',
                            'personal_informacion.cui_dpi',
                            'personal_informacion.no_cuenta',
                            'personal_informacion.tipo_cuenta',
                            'perfil_informacion.nombre_completo',
                            'perfil_informacion.departamento',
                            'perfil_informacion.puesto_designado',
                            'perfil_informacion.genero',
                            'perfil_informacion.telefono_movil',
                            'empresas.nombre as nombre_empresa'
                            )
                        ->get();



        // search by id
        if($request->empleado_id)
        {
            $users = DB::table('users')
            ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
            ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
            ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
            ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
            ->select('users.*',
                    'empleados.fecha_inicio_laboral',
                    'empleados.genero',
                    'empleados.tipo_contrato',
                    'empleados.tipo_pago',
                    'empleados.salario',
                    'empresas.nombre as empresa',
                    'perfil_informacion.departamento',
                    'perfil_informacion.puesto_designado',
                    'perfil_informacion.direccion'
                    )
                        ->where('empleado_id','LIKE','%'.$request->empleado_id.'%')
                        ->get();
        }
        // search by name
        if($request->nombre)
        {
            $users = DB::table('users')
            ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
            ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
            ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
            ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
            ->select('users.*',
                    'empleados.fecha_inicio_laboral',
                    'empleados.genero',
                    'empleados.tipo_contrato',
                    'empleados.tipo_pago',
                    'empleados.salario',
                    'empresas.nombre as empresa',
                    'perfil_informacion.departamento',
                    'perfil_informacion.puesto_designado',
                    'perfil_informacion.direccion'
                    )
                        ->where('users.nombre','LIKE','%'.$request->nombre.'%')
                        ->get();
        }
        // search by name
        if($request->puesto)
        {
            $users = DB::table('users')
            ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
            ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
            ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
            ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
            ->select('users.*',
                    'empleados.fecha_inicio_laboral',
                    'empleados.genero',
                    'empleados.tipo_contrato',
                    'empleados.tipo_pago',
                    'empleados.salario',
                    'empresas.nombre as empresa',
                    'perfil_informacion.departamento',
                    'perfil_informacion.puesto_designado',
                    'perfil_informacion.direccion'
                    )
                        ->where('users.puesto','LIKE','%'.$request->puesto.'%')
                        ->get();
        }

        // search by name and id
        if($request->empleado_id && $request->nombre)
        {
            $users = DB::table('users')
            ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
            ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
            ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
            ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
            ->select('users.*',
                    'empleados.fecha_inicio_laboral',
                    'empleados.genero',
                    'empleados.tipo_contrato',
                    'empleados.tipo_pago',
                    'empleados.salario',
                    'empresas.nombre as empresa',
                    'perfil_informacion.departamento',
                    'perfil_informacion.puesto_designado',
                    'perfil_informacion.direccion'
                    )
                        ->where('empleado_id','LIKE','%'.$request->empleado_id.'%')
                        ->where('users.nombre','LIKE','%'.$request->nombre.'%')
                        ->get();
        }
        // search by position and id
        if($request->empleado_id && $request->puesto)
        {
            $users = DB::table('users')
            ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
            ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
            ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
            ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
            ->select('users.*',
                    'empleados.fecha_inicio_laboral',
                    'empleados.genero',
                    'empleados.tipo_contrato',
                    'empleados.tipo_pago',
                    'empleados.salario',
                    'empresas.nombre as empresa',
                    'perfil_informacion.departamento',
                    'perfil_informacion.puesto_designado',
                    'perfil_informacion.direccion'
                    )
                        ->where('empleado_id','LIKE','%'.$request->empleado_id.'%')
                        ->where('users.puesto','LIKE','%'.$request->puesto.'%')
                        ->get();
        }
        // search by name and position
        if($request->nombre && $request->puesto)
        {
            $users = DB::table('users')
            ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
            ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
            ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
            ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
            ->select('users.*',
                    'empleados.fecha_inicio_laboral',
                    'empleados.genero',
                    'empleados.tipo_contrato',
                    'empleados.tipo_pago',
                    'empleados.salario',
                    'empresas.nombre as empresa',
                    'perfil_informacion.departamento',
                    'perfil_informacion.puesto_designado',
                    'perfil_informacion.direccion'
                    )
                     ->where('users.nombre','LIKE','%'.$request->nombre.'%')
                    ->where('users.puesto','LIKE','%'.$request->puesto.'%')
                        ->get();
        }
         // search by name and position and id
         if($request->empleado_id && $request->nombre && $request->puesto)
         {
             $users = DB::table('users')
             ->join('empleados', 'users.user_id', '=', 'empleados.empleado_id')
             ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
             ->join('personal_informacion', 'personal_informacion.user_id', '=', 'users.user_id')
             ->join('perfil_informacion', 'perfil_informacion.user_id', '=', 'users.user_id')
             ->select('users.*',
                     'empleados.fecha_inicio_laboral',
                     'empleados.genero',
                     'empleados.tipo_contrato',
                     'empleados.tipo_pago',
                     'empleados.salario',
                     'empresas.nombre as empresa',
                     'perfil_informacion.departamento',
                     'perfil_informacion.puesto_designado',
                     'perfil_informacion.direccion'
                     )
                         ->where('empleado_id','LIKE','%'.$request->empleado_id.'%')
                         ->where('users.nombre','LIKE','%'.$request->nombre.'%')
                         ->where('users.puesto','LIKE','%'.$request->puesto.'%')
                         ->get();

                        // dd($users);
         }
        return view('form.todosempleadocard',compact('users','userList','departamentos','puestos'));
    }
    public function employeeListSearch(Request $request)
    {
        $users = DB::table('users')
                    ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                    ->get();
        $permission_lists = DB::table('permission_lists')->get();
        $userList = DB::table('users')->get();

        // search by id
        if($request->employee_id)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->get();
        }
        // search by name
        if($request->name)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->get();
        }
        // search by name
        if($request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }

        // search by name and id
        if($request->employee_id && $request->name)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->get();
        }
        // search by position and id
        if($request->employee_id && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
        // search by name and position
        if($request->name && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
        // search by name and position and id
        if($request->employee_id && $request->name && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
        return view('form.employeelist',compact('users','userList','permission_lists'));
    }

    // employee profile with all controller user
    public function perfilEmpleado($user_id)
    {


     $familiares = Familiares::where('user_id', '=', $user_id)
                                ->get();
     $famContactos = Familiares::where('user_id', '=', $user_id)
                                ->where('contacto_emergencia', '=', 'SI')
                                ->get();
    //dd($famContactos);


        $Puestos   = DB::table('puestos')
        ->orderBy('nombre', 'asc')
        ->get();
        $PersonalDepartamentos   = DB::table('personal_departamentos')
                        ->orderBy('nombre', 'asc')
                        ->get();


         $User   = DB::table('users')->get();



        $users = DB::table('users')
                ->leftJoin('personal_informacion as personal_infoa','personal_infoa.user_id','users.user_id')
                ->leftJoin('perfil_informacion as perfil_info','perfil_info.user_id','users.user_id')
                ->where('users.user_id',$user_id)
                ->first();

        $user = DB::table('users')
                ->leftJoin('personal_informacion as personal_info','personal_info.user_id','users.user_id')
                ->leftJoin('perfil_informacion as perfil_info','perfil_info.user_id','users.user_id')
                ->select('personal_info.*' ,
                'users.nombre as user_nombre',
                'users.user_id as id_usuario',
                'users.email as user_correo',
                'users.avatar as user_avatar',
                'users.departamento as user_departamento',
                'users.puesto as user_puesto',
                'users.fecha_ingreso as user_fecha_ingreso',
                'perfil_info.*')
                ->where('users.user_id',$user_id)
                ->get();

                //dd($user);
        return view('form.perfilempleado',compact('user','users','User','Puestos','PersonalDepartamentos','familiares','famContactos'));
    }

    /** page departments */
    public function index()
    {
        $departments = DB::table('departments')->get();
        return view('form.departments',compact('departments'));
    }

    /** save record department */
    public function saveRecordDepartment(Request $request)
    {
        $request->validate([
            'department'        => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try{

            $department = department::where('department',$request->department)->first();
            if ($department === null)
            {
                $department = new department;
                $department->department = $request->department;
                $department->save();

                DB::commit();
                Toastr::success('Add new department successfully :)','Success');
                return redirect()->route('form/departments/page');
            } else {
                DB::rollback();
                Toastr::error('Add new department exits :)','Error');
                return redirect()->back();
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add new department fail :)','Error');
            return redirect()->back();
        }
    }

    /** update record department */
    public function updateRecordDepartment(Request $request)
    {
        DB::beginTransaction();
        try{
            // update table departments
            $department = [
                'id'=>$request->id,
                'department'=>$request->department,
            ];
            department::where('id',$request->id)->update($department);

            DB::commit();
            Toastr::success('updated record successfully :)','Success');
            return redirect()->route('form/departments/page');
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('updated record fail :)','Error');
            return redirect()->back();
        }
    }

    /** delete record department */
    public function deleteRecordDepartment(Request $request)
    {
        try {

            department::destroy($request->id);
            Toastr::success('Department deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Department delete fail :)','Error');
            return redirect()->back();
        }
    }

    /** page designations */
    public function designationsIndex()
    {
        return view('form.designations');
    }

    /** page time sheet */
    public function timeSheetIndex()
    {
        return view('form.timesheet');
    }

    /** page overtime */
    public function overTimeIndex()
    {
        return view('form.overtime');
    }

}
