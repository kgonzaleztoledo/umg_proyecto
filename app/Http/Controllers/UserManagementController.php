<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Employee;
use App\Models\Puesto as Puestos;

use App\Models\PersonalDepartamento as PersonalDepartamentos;
use App\Models\PerfilInformacion;
use App\Models\PersonalInformacion;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        if (Auth::user()->nombre_rol=='Super Admin')

        {
            $sku_empresa =Auth::user()->empresa_id;
            $result = DB::table('empresas')
            ->leftJoin('users','users.empresa_id','empresas.id')
            ->select('empresas.nombre as sucursal' ,'users.*')
            ->get();

             //   dd($result);

            $roles   = DB::table('rol_usuarios')->get();
            $empresas   = DB::table('empresas')->get();
            $puestos    = DB::table('puestos')->get();
            $departamentos  = DB::table('personal_departamentos')->get();
         //   $status_user = DB::table('user_types')->get();
            return view('usermanagement.user_control',compact('result','roles','puestos','departamentos','empresas'));
        }
        else
        {
            return redirect()->route('home');
        }

    }
    // search user
    public function buscarUser(Request $request)
    {
    //dd($request);
        if (Auth::user()->nombre_rol=='Super Admin' || Auth::user()->nombre_rol=='Admin')
        {
            $users      = DB::table('users')->get();
            $result     = DB::table('empresas')
            ->leftJoin('users','users.empresa_id','empresas.id')
            ->select('empresas.nombre as sucursal' ,'users.*')
            ->get();


            $roles  = DB::table('rol_usuarios')->get();
            $puestos   = DB::table('puestos')->get();
            $empresas   = DB::table('empresas')->get();

            $departamentos = DB::table('personal_departamentos')->get();
          //  $status_user = DB::table('user_types')->get();


            // search by name
            if($request->nombre)
            {
                $result = User::where('nombre','LIKE','%'.$request->nombre.'%')->get();
            }

            // search by role name
            if($request->nombre_rol)
            {
                $result = User::where('nombre_rol','LIKE','%'.$request->nombre_rol.'%')->get();
            }

            // search by status
            if($request->estado)
            {   $i = $request->estado;
                dd($i);
                $result = User::where('estado','LIKE','%'.$i.'%')->get();
            }

            // search by name and role name
            if($request->nombre && $request->nombre_rol)
            {
                $result = User::where('nombre','LIKE','%'.$request->nombre.'%')
                                ->where('nombre_rol','LIKE','%'.$request->nombre_rol.'%')
                                ->get();
            }

            // search by role name and status
            if($request->nombre_rol && $request->estado)
            {
                $result = User::where('nombre_rol','LIKE','%'.$request->nombre_rol.'%')
                                ->where('estado','LIKE','%'.$request->estado.'%')
                                ->get();
            }

            // search by name and status
            if($request->nombre && $request->estado)
            {
                $result = User::where('nombre','LIKE','%'.$request->nombre.'%')
                                ->where('estado','LIKE','%'.$request->estado.'%')
                                ->get();
            }

            // search by name and role name and status
            if($request->nombre && $request->nombre_rol && $request->estado)
            {
                $result = User::where('nombre','LIKE','%'.$request->nombre.'%')
                                ->where('nombre_rol','LIKE','%'.$request->nombre_rol.'%')
                                ->where('estado','LIKE','%'.$request->estado.'%')
                                ->get();


            }

            return view('usermanagement.user_control',compact('users','roles','empresas','puestos','departamentos','result'));
        }
        else
        {
            return redirect()->route('home');
        }

    }

    // use activity log
    public function activityLog()
    {
        $activityLog = DB::table('user_activity_logs')->get();
        return view('usermanagement.user_activity_log',compact('activityLog'));
    }
    // activity log
    public function activityLogInLogOut()
    {
        $activityLog = DB::table('bitacora')->get();
        return view('usermanagement.activity_log',compact('activityLog'));
    }

    //usuario de perfil
    public function perfil()
    {
        $profile = Session::get('user_id'); // obtener sesión user_id
        $userInformation = PersonalInformacion::where('user_id',$profile)->first();// informacion del usuario
       // dd($userInformation);

        $user = DB::table('users')->get();
        $employees = DB::table('perfil_informacion')->where('user_id',$profile)->first();


        if(empty($employees))
        {
            $information = DB::table('perfil_informacion')->where('user_id',$profile)->first();
           // dd($information);
            return view('usermanagement.perfil_usuario',compact('information','user','userInformation'));

        } else {
            $user_id = $employees->user_id;
            if($user_id == $profile)
            {
                $information = DB::table('perfil_informacion')->where('user_id',$profile)->first();
                return view('usermanagement.perfil_usuario',compact('information','user','userInformation'));
            } else {
                $information = PerfilInformacion::all();
                return view('usermanagement.perfil_usuario',compact('information','user','userInformation'));
            }
        }
    }

    // Grabar Perfil de informacion Usuario
    public function perfilInformacion(Request $request)
    {

   $img = $request->hidden_image;
        try {
            if(!empty($request->images))
            {
                $image_name = $request->hidden_image;
                $image = $request->file('images');
                if($image_name =='img_n.jpg')
                {
                    if($image != '')
                    {
                        $image_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/assets/images/'), $image_name);
                    }
                } else {
                    if($image != '')
                    {
                        $image_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/assets/images/'), $image_name);

                       unlink('assets/images/'.$img);
                    }
                }


                $update = [
                    'user_id' => $request->user_id,
                    'nombre'   => $request->name,
                    'avatar' => $image_name,
                ];
                User::where('user_id',$request->user_id)->update($update);
            }

            $information = PerfilInformacion::updateOrCreate(['user_id' => $request->user_id]);
            $information->nombre_completo         = $request->name;
            $information->user_id      = $request->user_id;
            $information->email        = $request->email;
            $information->fecha_nacimiento   = $request->birthDate;
            $information->genero       = $request->gender;
            $information->direccion      = $request->address;
            $information->estado        = $request->state;
            $information->ciudad      = $request->country;
            $information->codigo_postal    = $request->pin_code;
            $information->telefono_movil = $request->phone_number;
            $information->departamento   = $request->department;
            $information->puesto_designado  = $request->designation;
            $information->jefe_inmediato   = $request->reports_to;
            //dd($information);
            $information->save();

            DB::commit();
            Toastr::success('Información de perfil exitosamente :)','Éxito');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Error al agregar información de perfil :)','Error');
            return redirect()->back();
        }
    }

    // save new user
    public function addNewUserSave(Request $request)
    {

      // dd($request);
        $request->validate([
            'nombre'      => 'required|string|min:3|max:150',
            'email'     => 'required|string|email|max:255|unique:users',

            'nombre_rol' => 'required|string|max:255',
            'puesto'  => 'required|string|max:255',
            'departamento'=> 'required|string|max:255',
            'estado'    => 'required|string|max:255',
            'image'     => 'required|image',

            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);


        DB::beginTransaction();
        try{

            $dt       = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();


            $image_name = $request->hidden_image;
            $image = $request->file('images');
            if($image_name =='img_n.jpg')
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






            $user = new User;
            $user->nombre         = $request->nombre;
            $user->email        = $request->email;
            $user->fecha_ingreso    = $todayDate;

            $user->nombre_rol    = $request->nombre_rol;
            $user->puesto     = $request->puesto;
            $user->departamento   = $request->departamento;
            $user->estado       = $request->estado;
            $user->empresa_id       = $request->empresa;
            $user->avatar       = $image_name;
            $user->password     = Hash::make($request->password);
            $user->save();
            DB::commit();
            Toastr::success('Nuevo Usuario creado :)','con Éxito');
            return redirect()->route('userManagement');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Error al agregar una nueva cuenta por parte del usuario :)','Error');
            return redirect()->back();
        }
    }

    // update
    public function updateUser(Request $request)
    {
        DB::beginTransaction();
        try{

             $user_id       = $request->user_id;
            $nombre         = $request->nombre;
            $email        = $request->email;
            $nombre_rol    = $request->nombre_rol;
            $puesto     = $request->puesto;
            $departamento   = $request->departamento;
            $fecha_ingreso       = $request->fecha_ingreso;


            $dt       = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
            $image_name = $request->hidden_image;
            $image = $request->file('images');
            if($image_name =='img_n.jpg')
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

                'user_id'       => $user_id,
                'nombre'         => $nombre,
                'nombre_rol'    => $nombre_rol,
                'email'        => $email,
                'puesto'     => $puesto,
                'fecha_ingreso' => $fecha_ingreso,
                'departamento'   => $departamento,
              //  'estado'       => $estado,
                'avatar'       => $image_name,
            ];



            $e_estado = Auth::user()->estado;
            $e_nombre = Auth::user()->nombre;
            $e_email = Auth::user()->email;
            $e_nombre_rol = Auth::user()->nombre_rol;


            if($e_estado==1 ){
                $estado ='Activo';

            }
            else{
                $estado = 'Inactivo';
            }

            $activityLog = [
                'user_name'    => $e_nombre,
                'email'        => $e_email,
               // 'phone_number' => $phone,
                'status'       => $estado,
                'role_name'    => $e_nombre_rol,
                'modify_user'  => 'Update',
                'date_time'    => $todayDate,
            ];

            DB::table('user_activity_logs')->insert($activityLog);
            User::where('user_id',$request->user_id)->update($update);
            DB::commit();
            Toastr::success('Usuario actualizado con :)','Éxito');
            return redirect()->route('userManagement');

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Error en la actualización del usuario :)','Fallo');
            return redirect()->back();
        }
    }
    // delete
    public function delete(Request $request)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');
        DB::beginTransaction();
        try{
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

            if($request->avatar =='photo_defaults.jpg'){
                User::destroy($request->id);
            }else{
                User::destroy($request->id);
                unlink('assets/images/'.$request->avatar);
            }
            DB::commit();
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->route('userManagement');

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('User deleted fail :)','Error');
            return redirect()->back();
        }
    }

    // view change password
    public function changePasswordView()
    {
        return view('settings.changepassword');
    }

    // change password in db
    public function changePasswordDB(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        DB::commit();
        Toastr::success('User change successfully :)','Success');
        return redirect()->intended('home');
    }
}









