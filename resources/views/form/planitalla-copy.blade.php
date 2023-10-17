<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInformacion;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class PersonalInformacionController extends Controller
{
    /** save record */
    public function personalInformacion(Request $request)
    {
        $request->validate([
            'cui_dpi'          => 'required|string|min:13|max:13',
            'fecha_vec_dpi' => 'required|date',
            'img_frontal_dpi' => 'required|image|mimes:jpg,png,jpeg|max:3096'

        ]);


      //dd($request);
        $img_dpi_frotal_hidden = $request->img_dpi_frotal_hidden;

        DB::beginTransaction();
        try {

            if (!is_null ($img_dpi_frotal_hidden)){
                $dpi_frontal = time().'.'.$request->img_frontal_dpi->extension();
                $request->img_frontal_dpi->move(public_path('assets/documentos_personales'), $dpi_frontal);
            }
            else{
                  $dpi_frontal = time().'.'.$request->img_frontal_dpi->extension();
            $request->img_frontal_dpi->move(public_path('assets/documentos_personales'), $dpi_frontal);

            unlink('assets/documentos_personales/'.$img_dpi_frotal_hidden);

            }




            $user_informacion = PersonalInformacion::firstOrNew(
                ['user_id' =>  $request->user_id],
            );
            $user_informacion->user_id              = $request->user_id;
            $user_informacion->cui_dpi          = $request->cui_dpi;
            $user_informacion->fecha_vec_dpi = $request->fecha_vec_dpi;
            $user_informacion->no_licencia                  = $request->no_licencia;
            $user_informacion->fecha_vec_licencia          = $request->fecha_vec_licencia;
            $user_informacion->nit             = $request->nit;
            $user_informacion->tipo_licencia       = $request->tipo_licencia;
            $user_informacion->movil = $request->movil;
            $user_informacion->nacionalidad             = $request->nacionalidad;
            $user_informacion->religion             = $request->religion;
            $user_informacion->estado_civil             = $request->estado_civil;
            $user_informacion->total_hijos             = $request->total_hijos;
            $user_informacion->banco             = $request->banco;
            $user_informacion->no_cuenta             = $request->no_cuenta;
            $user_informacion->tipo_cuenta             = $request->tipo_cuenta;
            $user_informacion->img_frontal_dpi       = $dpi_frontal;
            $user_informacion->save();

            DB::commit();
            Toastr::success('Regitro ingresado con Éxito :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Error al agregar información personal :)','Error');
            return redirect()->back();
        }
    }
}
