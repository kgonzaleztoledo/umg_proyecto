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
class VistaDetallePlanilla extends Component
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


            $DetallePLanillas = DB::table('empleados')
                        ->join('detalle_nominas', 'empleados.id', '=', 'detalle_nominas.empleado_id')

                        ->join('encabezado_nominas', 'detalle_nominas.encabezado_nominas_id', '=', 'encabezado_nominas.id')
                        ->join('tipo_planillas', 'encabezado_nominas..tipo_planilla_id', '=', 'tipo_planillas.id')
                        ->select('empleados.*', 'detalle_nominas.*','encabezado_nominas.*','tipo_planillas.*',
                         )
                         ->where('encabezado_nominas_id','=', '167')
                        ->where('nombre_empleado','LIKE','%'.$this->search.'%')
                        ->get();
             return view('livewire.vista-detalle-planilla',compact('DetallePLanillas'));
    }
}
