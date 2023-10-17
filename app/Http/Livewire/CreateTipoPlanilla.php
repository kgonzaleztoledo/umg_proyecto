<?php

namespace App\Http\Livewire;

use App\Models\TipoPlanilla as TipoPlanillas;
use \Illuminate\Support\Facades\DB;
use App\Models\Empresa as Empresas;

use Brian2694\Toastr\Facades\Toastr;

use Livewire\Component;

use Auth;
class CreateTipoPlanilla extends Component
{

    public $nombre;

    protected $rules = [
        'nombre' => 'required|min:4|max:50'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }




    public function save()
    {

        $this->validate();
        $nombre = $this->nombre;


        DB::beginTransaction();
        try {


            $sku_empresa = Auth::user()->empresa_id;


            $Empresas = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);

            $sku = $Empresas->sku_empresa;


            if ($TipoPlanilla = TipoPlanillas::where('nombre', '=', $nombre)
                ->where('sku_empresa', '=', $sku)
                ->exists()
            ) {

                DB::rollback();
                Toastr::error('Categoria ya registrada Validar Acción :(', 'Error');
                return redirect()->route('form/planillas/page');
            } else {

                $TipoPlanilla = new TipoPlanillas;


                $TipoPlanilla->nombre = $nombre;
                $TipoPlanilla->sku_empresa = $sku;

                $TipoPlanilla->save();


                DB::commit();
                $this->reset(['nombre']);


                $this->emitTo('vista-tipo-planilla', 'render');
                $this->emit('alert-add');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Categoria ya registrada  Validar Acción :(', 'Error');
        }
    }

    public function render()
    {
        return view('livewire.create-tipo-planilla');
    }
}
