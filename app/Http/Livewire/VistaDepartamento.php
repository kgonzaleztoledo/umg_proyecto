<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PersonalDepartamento as PersonalDepartamentos;
use \Illuminate\Support\Facades\DB;
use App\Models\Empresa as Empresas;
use Brian2694\Toastr\Facades\Toastr;

use Auth;

class VistaDepartamento extends Component
{


    public $search = "";

    public $Id;

    public $nombre;
    public $descripcion;


    protected $listeners = ['render'];
    protected $rules = [
        'nombre' => 'required|min:4|max:50',
        'descripcion' => 'required|min:4|max:200'
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


        $departamentos = PersonalDepartamentos::where('nombre', 'like', '%' . $this->search . '%')
            ->where('sku_empresa', $sku)
            ->orderBy('id', 'DESC')
            ->get();
        return view('livewire.vista-departamento',compact('departamentos'));
    }

    public function clear()
    {
        $nombre = "";

        $descripcion = "";
    }
    public function edit($id)
    {

        $PersonalDepartamento = PersonalDepartamentos::find($id);

        $this->nombre = $PersonalDepartamento->nombre;

        $this->descripcion = $PersonalDepartamento->descripcion;
        $this->Id = $PersonalDepartamento->id;
    }


    public function update($id)
    {

        $validatedData = $this->validate();
        $nombreDepartamento = $this->nombre;

        $descripcion = $this->descripcion;

        $sku_empresa = Auth::user()->empresa_id;
        $Empresa = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);
        $sku = $Empresa->sku_empresa;


        DB::beginTransaction();
        try {
            $PersonalDepartamento = PersonalDepartamentos::where('nombre', '=', $nombreDepartamento)->find($id);
       //     dd($NombreRoles);


            if ($PersonalDepartamento === null) {

                $PersonalDepartamento = [
                    'nombre' => $nombreDepartamento,
                    'descripcion' => $descripcion,
                    'sku_empresa' => $sku

                ];
                PersonalDepartamentos::where('id', $id)->update($PersonalDepartamento,$validatedData  );

                $this->clear();
                DB::commit();
                $this->reset(['nombre','descripcion']);
                $this->emitTo('vista-departamento', 'render');
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
