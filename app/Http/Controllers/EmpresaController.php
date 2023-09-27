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



    public function searchEmpresa(Request $request)
    {

     //   dd($request);
        if (Auth::user()->role_name=='Admin')
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
                $empresas = Empresa::where('nombre','LIKE','%'.$request->empresas.'%')->get();
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
                $empresas = Empresa::where('name','LIKE','%'.$request->nombre.'%')
                                ->where('role_name','LIKE','%'.$request->sk_empresa.'%')
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

}
