<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TipoPlanilla as TipoPlanillas;
use \Illuminate\Support\Facades\DB;
use App\Models\Empresa as Empresas;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class VistaTipoPlanilla extends Component
{

    public $search = "";

    public $Id;

    public $nombre;


    protected $listeners = ['render'];
    protected $rules = [
        'nombre' => 'required|min:4|max:50',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {

        $sku_empresa = Auth::user()->empresa_id;


        $Empresa = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);
        $sku = $Empresa->sku_empresa;


        $planillas = TipoPlanillas::where('nombre', 'like', '%' . $this->search . '%')
            ->where('sku_empresa', $sku)
            ->orderBy('id', 'DESC')
            ->get();


        return view('livewire.vista-tipo-planilla', compact('planillas'));
    }

    public function clear()
    {
        $nombre = "";

        $descripcion = "";
    }
    public function edit($id)
    {

        $TipoPlanillas = TipoPlanillas::find($id);

        $this->nombre = $TipoPlanillas->nombre;

        $this->Id = $TipoPlanillas->id;
    }


    public function update($id)

    {


        $validatedData = $this->validate();  //funcio de validaciones
        $nombrePlanilla = $this->nombre;


        $sku_empresa = Auth::user()->empresa_id;
        $Empresa = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);
        $sku = $Empresa->sku_empresa;


        DB::beginTransaction();
        try {
            $TipoPlanilla = TipoPlanillas::where('nombre', '=', $nombrePlanilla)->find($id);
            //     dd($NombreRoles);


            if ($TipoPlanilla === null) {

                $TipoPlanilla = [
                    'nombre' => $nombrePlanilla,
                    'sku_empresa' => $sku

                ];
                TipoPlanillas::where('id', $id)->update($TipoPlanilla, $validatedData);

                $this->clear();
                DB::commit();
                $this->reset(['nombre']);
                $this->emitTo('vista-rol-usuario', 'render');
                $this->emit('alert-update');
            } else {
                DB::rollback();
                $this->emit('alert-error');
            }
        } catch (\Exception $e) {
            DB::rollback();
            $this->emit('alert-error');
        }
    }


    public function delete($id)
    {
    }
}
