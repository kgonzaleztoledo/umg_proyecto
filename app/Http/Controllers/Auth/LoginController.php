<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);
      //  dd($request);
        $username = $request->email;
        $password = $request->password;


        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        if (Auth::attempt(['email'=> $username,'password'=> $password,'estado'=>'1'])) {
            /** get session */
            $user = Auth::User();

            Session::put('nombre', $user->nombre);
            Session::put('empresa_id', $user->empresa_id);
            Session::put('email', $user->email);
            Session::put('user_id', $user->user_id);
            Session::put('fecha_ingreso', $user->fecha_ingreso);

            Session::put('estado', $user->estado);
            Session::put('nombre_rol', $user->nombre_rol);
            Session::put('avatar', $user->avatar);
            Session::put('puesto', $user->puesto);
            Session::put('departamento', $user->departamento);

            $activityLog = ['name'=> Session::get('nombre'),'email'=> $username,'description' => 'Ha iniciado sesión','date_time'=> $todayDate,];
            DB::table('bitacora')->insert($activityLog);

            Toastr::success('Se inicio sesión correctamente :)','Éxito');
            return redirect()->intended('home');
        } else {
            Toastr::error('Falla, en email o contraseña incorrecta :)','Error');
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        $activityLog = ['name'=> Session::get('nombre'),'email'=> Session::get('email'),'description' => 'Ha cerrado sesión','date_time'=> $todayDate,];
        DB::table('bitacora')->insert($activityLog);
        // forget login session
        $request->session()->forget('nombre');
        $request->session()->forget('empresa_id');

        $request->session()->forget('email');
        $request->session()->forget('user_id');

        $request->session()->forget('fecha_ingreso');

        $request->session()->forget('estado');
        $request->session()->forget('nombre_rol');
        $request->session()->forget('avatar');
        $request->session()->forget('puesto');
        $request->session()->forget('departamento');
        $request->session()->flush();
        Auth::logout();
        Toastr::success('Se cerro con éxito sesión :)','exitosamente ');
        return redirect('login');
    }

}
