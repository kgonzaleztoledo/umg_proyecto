<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Empresa;
use App\Models\module_permission;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;



class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = DB::table('empresas')->get();
        //dd($empresas);
        return view('form.empresas',compact('empresas'));
    }

    public function indexDescuento()
    {
        //dd($empresas);
        return view('form.descuentolistado');
    }



    //Function para traer el modulo ROL USUARIO
    public function indexrolUsuario()
    {
        //dd($empresas);
        return view('form.rolUsuarioListado');
    }

    public function indexDepartamento()
    {
        //dd($empresas);
        return view('form.departamentoListado');
    }




    public function indexPuesto()
    {
        //dd($empresas);
        return view('form.puestoListado');
    }


    //funcion de Categorias TIpo de planillas
    public function indexPlanilla()
    {
        //dd($empresas);
        return view('form.planillaListado');
    }

    public function indexPlanillaElectronica()
    {
        //dd($empresas);
        return view('form.encabezado_nomina');
    }

    public function viewDetallePlanilla($employeid)
        {



            $sku_empresa =Auth::user()->empresa_id;
            $Empresa = Empresa::where('id', '=', $sku_empresa)->find($sku_empresa);
            $sku = $Empresa->sku_empresa;


                $DetallePLanillas = DB::table('empleados')
                            ->join('detalle_nominas', 'empleados.id', '=', 'detalle_nominas.empleado_id')

                            ->join('encabezado_nominas', 'detalle_nominas.encabezado_nominas_id', '=', 'encabezado_nominas.id')
                            ->join('tipo_planillas', 'encabezado_nominas..tipo_planilla_id', '=', 'tipo_planillas.id')
                            ->select('empleados.*', 'detalle_nominas.*','detalle_nominas.id as imprimirid','encabezado_nominas.*','tipo_planillas.*',
                             )
                             ->where('encabezado_nominas_id',$employeid)
                            ->get();

//                            dd($DetallePLanillas);

      // $idencabeza= $employeid;
        return view('form.detalle_nomina' , compact('DetallePLanillas'));
    }

    public function ImprimirReporteEmpleado($impimirempleado)

        {
            $sku_empresa =Auth::user()->empresa_id;
            $Empresa = Empresa::where('id', '=', $sku_empresa)->find($sku_empresa);
            $sku = $Empresa->sku_empresa;


                $DetallePLanillas = DB::table('empleados')
                                 ->join('detalle_nominas', 'empleados.id', '=', 'detalle_nominas.empleado_id')

                                 ->join('users', 'empleados.empleado_id', '=', 'users.user_id')
                                 ->join('encabezado_nominas', 'detalle_nominas.encabezado_nominas_id', '=', 'encabezado_nominas.id')

                                 ->select(
                                    'detalle_nominas.id as codigo_nomina',

                                    'detalle_nominas.bonificacion_ley as bono',
                                    'detalle_nominas.total_hrs_extras as h_extras',


                                    'empleados.*',
                                    'users.avatar',
                                    'encabezado_nominas.mes',

                                    'encabezado_nominas.ano',
                                    )
                                 ->where('detalle_nominas.id',$impimirempleado)->first();


                         //    dd($DetallePLanillas);


        return view('reportes.ficha_pago_empleado' , compact('DetallePLanillas'));

        }

    public function searchEmpresa(Request $request)
    {


     //  dd($request);
        if (Auth::user()->nombre_rol=='Admin' || Auth::user()->nombre_rol=='Super Admin' )
        {
            $empresas   = DB::table('empresas')->get();
         //   $result     = DB::table('users')->get();
        //    $role_name  = DB::table('role_type_users')->get();
        //    $position   = DB::table('position_types')->get();
        //    $department = DB::table('departments')->get();
        //    $status_user = DB::table('user_types')->get();

            // search by name
            if($request->nombre)
            {
                $empresas = Empresa::where('nombre','LIKE','%'.$request->nombre.'%')->get();
            }

            // search by role name
            if($request->sku_empresa)
            {
                $empresas = Empresa::where('sku_empresa','LIKE','%'.$request->sku_empresa.'%')->get();
            }

            // search by status
            if($request->email)
            {
                $empresas = Empresa::where('email','LIKE','%'.$request->email.'%')->get();
            }

            // search by name and role name
            if($request->nombre && $request->sku_empresa)
            {
                $empresas = Empresa::where('nombre','LIKE','%'.$request->nombre.'%')
                                ->where('sku_empresa','LIKE','%'.$request->sku_empresa.'%')
                                ->get();
            }

            // search by role name and status
            if($request->sku_empresa && $request->email)
            {
                $empresas = Empresa::where('sku_empresa','LIKE','%'.$request->sku_empresa.'%')
                                ->where('email','LIKE','%'.$request->email.'%')
                                ->get();
            }

            // search by name and status
            if($request->nombre && $request->email)
            {
                $empresas = Empresa::where('nombre','LIKE','%'.$request->nombre.'%')
                                ->where('email','LIKE','%'.$request->email.'%')
                                ->get();
            }

            // search by name and role name and status
            if($request->nombre && $request->sku_empresa && $request->email)
            {
                $empresas = Empresa::where('nombre','LIKE','%'.$request->nombre.'%')
                                ->where('sku_empresa','LIKE','%'.$request->sku_empresa.'%')
                                ->where('email','LIKE','%'.$request->email.'%')
                                ->get();
            }

            return view('form.empresas',compact('empresas'));
        }
        else
        {
            return redirect()->route('home');
        }

    }

//funcion para guardar registro de empresa
    public function addNewEmpresaSave(Request $request)

    {

       // dd($request);
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:empresas',
            'logo'     => 'required|image',


        ]);

        DB::beginTransaction();
        try{

            $image = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('assets/images'), $image);

            $empresa = new Empresa();
            $empresa->nombre = $request->nombre;
            $empresa->email    = $request->email;;
            $empresa->contacto_persona = $request->contacto_persona;
            $empresa->movil     = $request->movil;

            $empresa->telefono    = $request->telefono;

            $empresa->direccion = $request->direccion;
            $empresa->sitio_web   = $request->sitio_web;
            //$empresa->sku_empresa ='hola';
            $empresa->logo       = $image;

          //  dd($empresa);
            $empresa->save();
            DB::commit();
            Toastr::success('Registro de  nueva Empresa exitosamente :)','Éxito');

            return redirect()->route('form/empresas/page');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Error al agregar una nueva empresa :)','Error');
            return redirect()->back();
        }
    }



 // Update Actualizar Formulario de Empresa
 public function updateEmpresa(Request $request)
 {

  // dd($request);
     DB::beginTransaction();
     try{
         $sku_empresa      = $request->sku_empresa;
         $nombre         = $request->nombre;
         $email        = $request->email;
         $contacto_persona    = $request->contacto_persona;
         $movil     = $request->movil;
         $telefono        = $request->telefono;
         $direccion   = $request->direccion;

         $sitio_web   = $request->sitio_web;


        // $image = time().'.'.$request->logo->extension();
       //  $request->logo->move(public_path('assets/images'), $image);


         $dt       = Carbon::now();
         $todayDate = $dt->toDayDateTimeString();

         $image_name = $request->hidden_logo ;
         $image = $request->file('logos');
         if($image_name =='photo_defaults.jpg')
         {
             if($image != '')
             {
                 $image_name = rand() . '.' . $image->getClientOriginalExtension();
                 $image->move(public_path('/assets/images/'), $image_name);
             }
         }
         else{

             if($image != '')
             {
                 unlink('assets/images/'.$image_name);
                 $image_name = rand() . '.' . $image->getClientOriginalExtension();
                 $image->move(public_path('/assets/images/'), $image_name);
             }
         }

         $update = [

             'sku_empresa'       => $sku_empresa,
             'nombre'         => $nombre,
             'email'    => $email,
             'contacto_persona'     => $contacto_persona,
             'movil' => $movil,
             'telefono'   => $telefono,
             'direccion'       => $direccion,
             'sitio_web'       => $sitio_web,
             'logo'       => $image_name,
         ];

         //array log de update
         $name = Auth::user()->name;
         $email = Auth::user()->email;

         $phone = Auth::user()->phone_number;
         $status = Auth::user()->status;

         $role_name = Auth::user()->role_name;


         $activityLog = [
            'user_name'    => $name,
            'email'        => $email,
            'phone_number' => $phone,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Update',
            'date_time'    => $todayDate,
        ];




        DB::table('user_activity_logs')->insert($activityLog);
         Empresa::where('sku_empresa',$request->sku_empresa)->update($update);
         DB::commit();
         Toastr::success('Empresa actualizada con éxito :)','Success');
         return redirect()->route('form/empresas/page');

     }catch(\Exception $e){
         DB::rollback();
         Toastr::error('Falla la actualización de la Empresa :)','Error');
         return redirect()->back();
     }


 }


 public function deleteEmpresa(Request $request)
 {
     $user = Auth::User();
     Session::put('user', $user);
     $user=Session::get('user');
     DB::beginTransaction();
     try{

        // Variables para insertar en la abla log ed usuario
         $fullName     = $user->name;
         $email        = $user->email;
         $phone_number = $user->phone_number;
         $status       = $user->status;
         $role_name    = $user->role_name;

         $dt       = Carbon::now();
         $todayDate = $dt->toDayDateTimeString();

         $activityLog = [

             'user_name'    => $fullName,
             'email'        => $email,
             'phone_number' => $phone_number,
             'status'       => $status,
             'role_name'    => $role_name,
             'modify_user'  => 'Delete',
             'date_time'    => $todayDate,
         ];

         DB::table('user_activity_logs')->insert($activityLog);
             //Fin
         if($request->avatar =='photo_defaults.jpg'){
             Empresa::destroy($request->id);
         }else{
             Empresa::destroy($request->id);
             unlink('assets/images/'.$request->logo);
         }
         DB::commit();
         Toastr::success('Empresa eliminada exitosamente :)','Éxito');
         return redirect()->route('form/empresas/page');

     }catch(\Exception $e){
         DB::rollback();
         Toastr::error('Error al eliminar Empresa :)','Error');
         return redirect()->back();
     }
 }

}
