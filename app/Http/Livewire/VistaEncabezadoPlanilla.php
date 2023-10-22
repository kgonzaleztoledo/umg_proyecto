<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EncabezadoPlanilla as EncabezadoPlanillas;
use \Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Empresa;
//use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Session;

use Brian2694\Toastr\Facades\Toastr;

use Auth;

class VistaEncabezadoPlanilla extends Component
{

    public $search = "";

    public $Id;

    public $ano;

    protected $listeners = ['render'];
    protected $rules = [
        'ano' => 'required|min:4|max:50'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }




    public function render()

    {

        $sku_empresa =Auth::user()->empresa_id;



        $Empresa = Empresa::where('id', '=', $sku_empresa)->find($sku_empresa);
        $sku = $Empresa->sku_empresa;


   //  dd($sku_empresa);


            $EncabezadoPLanillas = DB::table('tipo_planillas')
                        ->join('encabezado_nominas', 'tipo_planillas.id', '=', 'encabezado_nominas.tipo_planilla_id')
                        ->select('tipo_planillas.*', 'encabezado_nominas.*',
                         )

                        ->where('ano','LIKE','%'.$this->search.'%')

                        ->orwhere('mes','LIKE','%'.$this->search.'%')
                    ->orderBy('mes','desc')
                        ->get();


             // dd($EncabezadoPLanillas);




        return view('livewire.vista-encabezado-planilla',compact('EncabezadoPLanillas'));
    }
}
