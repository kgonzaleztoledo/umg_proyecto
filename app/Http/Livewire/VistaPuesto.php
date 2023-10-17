<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Puesto as Puestos;
use \Illuminate\Support\Facades\DB;
use App\Models\Empresa as Empresas;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class VistaPuesto extends Component
{
    public $search = "";

    public $Id;

    public $nombre;
    public $descripcion;


    protected $listeners = ['render'];
    protected $rules = [
        'nombre' => 'required|min:4|max:50',
        'descripcion' => 'required|min:10|max:200'
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


        $puestos = Puestos::where('nombre', 'like', '%' . $this->search . '%')
            ->where('sku_empresa', $sku)
            ->orderBy('id', 'DESC')
            ->get();

        return view('livewire.vista-puesto',compact('puestos'));
    }
    public function clear()
    {
        $nombre = "";

        $descripcion = "";
    }
    public function edit($id)
    {

        $Puesto = Puestos::find($id);

        $this->nombre = $Puesto->nombre;

        $this->descripcion = $Puesto->descripcion;
        $this->Id = $Puesto->id;
    }


    public function update($id)
    {


        $validatedData = $this->validate();
        $nombrePuesto = $this->nombre;

        $descripcion = $this->descripcion;

        $sku_empresa = Auth::user()->empresa_id;
        $Empresa = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);
        $sku = $Empresa->sku_empresa;


        DB::beginTransaction();
        try {
            $Puesto = Puestos::where('nombre', '=', $nombrePuesto)->find($id);
       //     dd($NombreRoles);


            if ($Puesto === null) {

                $Puesto = [
                    'nombre' => $nombrePuesto,
                    'descripcion' => $descripcion,
                    'sku_empresa' => $sku

                ];
                Puestos::where('id', $id)->update($Puesto,$validatedData );

                $this->clear();
                DB::commit();
                $this->reset(['nombre','descripcion']);
                $this->emitTo('vista-puesto', 'render');
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
