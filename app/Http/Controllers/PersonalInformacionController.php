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

        ]);



        DB::beginTransaction();
        try {


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


    public function updateDpiFrontal(Request $request)
    {
        $request->validate([
            'img_frontal_dpi' => 'required|image|mimes:jpg,png,jpeg|max:3096'
        ]);
      $img_dpi_frontal_hidden = $request->img_dpi_frontal_hidden;

     //dd($request);

      DB::beginTransaction();
      try {

          if (is_null ($request->img_dpi_frontal_hidden)){
              $dpi_frontal = time().'.'.$request->img_frontal_dpi->extension();
              $request->img_frontal_dpi->move(public_path('assets/documentos_personales'), $dpi_frontal);
          }
          else{
            $dpi_frontal = time().'.'.$request->img_frontal_dpi->extension();
            $request->img_frontal_dpi->move(public_path('assets/documentos_personales'), $dpi_frontal);

            unlink('assets/documentos_personales/'.$img_dpi_frontal_hidden);

          }


            $user_informacion = PersonalInformacion::firstOrNew(
                ['user_id' =>  $request->user_id],
            );

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
    public function updateDpiAdverso(Request $request)
    {
        $request->validate([
            'img_adverso_dpi' => 'required|image|mimes:jpg,png,jpeg|max:3096'


        ]);

      $img_dpi_adverso_hidden = $request->img_dpi_adverso_hidden;

        //  dd($request);

      DB::beginTransaction();
      try {

          if (is_null ($request->img_dpi_adverso_hidden)){
              $dpi_adverso = time().'.'.$request->img_adverso_dpi->extension();
              $request->img_adverso_dpi->move(public_path('assets/documentos_personales'), $dpi_adverso);
          }
        else{
                $dpi_adverso = time().'.'.$request->img_adverso_dpi->extension();
                $request->img_adverso_dpi->move(public_path('assets/documentos_personales'), $dpi_adverso);
                unlink('assets/documentos_personales/'.$img_dpi_adverso_hidden);

          }


            $user_informacion = PersonalInformacion::firstOrNew(
                ['user_id' =>  $request->user_id],
            );

            $user_informacion->img_adverso_dpi       = $dpi_adverso;
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

    public function updatePdfPoliciaco(Request $request)
    {


   //  dd($request);


        $request->validate([
            'pdf_policiacos' => 'required|mimes:pdf|max:8000'


        ]);

      $pdf_policiacos_hidden = $request->pdf_policiacos_hidden;


      DB::beginTransaction();
      try {

          if (is_null ($request->pdf_policiacos_hidden)){
            $e_pdf_policiacos = time().'.'.$request->pdf_policiacos->extension();
            $request->pdf_policiacos->move(public_path('assets/documentos_personales/pdf'), $e_pdf_policiacos);
          }
        else{
                $e_pdf_policiacos = time().'.'.$request->pdf_policiacos->extension();
                $request->pdf_policiacos->move(public_path('assets/documentos_personales/pdf'), $e_pdf_policiacos);
                unlink('assets/documentos_personales/pdf/'.$pdf_policiacos_hidden);

          }


            $user_informacion = PersonalInformacion::firstOrNew(
                ['user_id' =>  $request->user_id],
            );

            $user_informacion->pdf_policiacos = $e_pdf_policiacos;
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

    public function updatePdfPenales(Request $request)
    {
        $request->validate([
            'pdf_penales' => 'required|mimes:pdf|max:8000'
        ]);
      $pdf_penales_hidden = $request->pdf_penales_hidden;

      DB::beginTransaction();
      try {

          if (is_null ($request->pdf_penales_hidden)){
            $e_pdf_penales = time().'.'.$request->pdf_penales->extension();
            $request->pdf_penales->move(public_path('assets/documentos_personales/pdf'), $e_pdf_penales);
          }
        else{
                $e_pdf_penales = time().'.'.$request->pdf_penales->extension();
                $request->pdf_penales->move(public_path('assets/documentos_personales/pdf'), $e_pdf_penales);
                unlink('assets/documentos_personales/pdf/'.$pdf_penales_hidden);

          }
            $user_informacion = PersonalInformacion::firstOrNew(
                ['user_id' =>  $request->user_id],
            );

            $user_informacion->pdf_penales = $e_pdf_penales;
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

    public function updatePdfCv(Request $request)
    {

        $request->validate([
            'pdf_cv' => 'required|mimes:pdf|max:8000'
        ]);
     // dd($request);
        $pdf_cv_hidden = $request->pdf_cv_hidden;

      DB::beginTransaction();
      try {

          if (is_null ($request->pdf_cv_hidden)){
            $e_pdf_cv = time().'.'.$request->pdf_cv->extension();
            $request->pdf_cv->move(public_path('assets/documentos_personales/pdf'), $e_pdf_cv);
          }
        else{
                $e_pdf_cv = time().'.'.$request->pdf_cv->extension();
                $request->pdf_cv->move(public_path('assets/documentos_personales/pdf'), $e_pdf_cv);
                unlink('assets/documentos_personales/pdf/'.$pdf_cv_hidden);

          }
            $user_informacion = PersonalInformacion::firstOrNew(
                ['user_id' =>  $request->user_id],
            );

            $user_informacion->pdf_cv = $e_pdf_cv;
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
