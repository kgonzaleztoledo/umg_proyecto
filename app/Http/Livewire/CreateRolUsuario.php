<?php

namespace App\Http\Livewire;

use App\Models\RolUsuario as RolUsuarios;
use \Illuminate\Support\Facades\DB;
use App\Models\User as Users;
use App\Models\Empresa as Empresas;

use Brian2694\Toastr\Facades\Toastr;

use Livewire\Component;
use Auth;

class CreateRolUsuario extends Component
{
    public $nombre_rol;

    protected $rules = [
        'nombre_rol' => 'required|min:4|max:50'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save()
    {

        $this->validate();

        $nombre_roles = $this->nombre_rol;
        DB::beginTransaction();
        try {


            $sku_empresa = Auth::user()->empresa_id;


            $Empresa = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);

            $sku = $Empresa->sku_empresa;

            if ($RolUsuario = RolUsuarios::where('nombre_rol', '=', $nombre_roles)
                ->where('sku_empresa', '=', $sku)
                ->exists()
            ) {

                DB::rollback();
                Toastr::error('Categoria ya registrada Validar Acción :(', 'Error');
                return redirect()->route('form/rol_usuario/page');
            } else {

                $RolUsuario = new RolUsuarios;


                $RolUsuario->nombre_rol = $nombre_roles;

                $RolUsuario->sku_empresa = $sku;

                $RolUsuario->save();


                DB::commit();

                $this->reset(['nombre_rol']);
                $this->emitTo('vista-rol-usuario', 'render');
                $this->emit('alert-add');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Categoria ya registrada  Validar Acción :(', 'Error');
        }
    }

    public function render()
    {
        return view('livewire.create-rol-usuario');
    }
}
