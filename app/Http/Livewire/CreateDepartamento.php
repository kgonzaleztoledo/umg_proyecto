<?php

namespace App\Http\Livewire;


use App\Models\PersonalDepartamento as PersonalDepartamentos;
use \Illuminate\Support\Facades\DB;
use App\Models\Empresa as Empresas;

use Brian2694\Toastr\Facades\Toastr;

use Livewire\Component;

use Auth;

class CreateDepartamento extends Component
{



    public $nombre;
    public $descripcion;

    protected $rules = [
        'nombre' => 'required|min:4|max:50',
        'descripcion' => 'required|min:4|max:250'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function save()
    {

        $this->validate();

        $nombre = $this->nombre;

        $descrip = $this->descripcion;
        DB::beginTransaction();
        try {


            $sku_empresa = Auth::user()->empresa_id;


            $Empresas = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);

            $sku = $Empresas->sku_empresa;
            $SKU = $descrip . $sku;

            if ($PersonalDepartamento = PersonalDepartamentos::where('nombre', '=', $nombre)
                ->where('sku_empresa', '=', $sku)
                //where('sku_empres', '=', $sku)
                ->exists()
            ) {

                DB::rollback();
                Toastr::error('Categoria ya registrada Validar Acción :(', 'Error');
                return redirect()->route('form/departamentos/page');
            } else {

                $PersonalDepartamento = new PersonalDepartamentos;


                $PersonalDepartamento->nombre = $nombre;
                $PersonalDepartamento->descripcion = $descrip;

                $PersonalDepartamento->sku_empresa = $sku;

                $PersonalDepartamento->save();


                DB::commit();
                $this->reset(['nombre','descripcion']);


                $this->emitTo('vista-departamento', 'render');
                $this->emit('alert-add');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Categoria ya registrada  Validar Acción :(', 'Error');
        }
    }
    public function render()
    {
        return view('livewire.create-departamento');
    }
}
