<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RolUsuario as RolUsuarios;
use \Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Empresa;
//use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Session;

use Brian2694\Toastr\Facades\Toastr;

use Auth;

class VistaRolUsuario extends Component
{
    public $search = "";

    public $Id;

    public $nombre_rol;

    protected $listeners = ['render'];
    protected $rules = [
        'nombre_rol' => 'required|min:4|max:50'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        $sku_empresa = Auth::user()->empresa_id;


        $Empresa = Empresa::where('id', '=', $sku_empresa)->find($sku_empresa);
        $sku = $Empresa->sku_empresa;


        $rol_usuarios = RolUsuarios::where('nombre_rol', 'like', '%' . $this->search . '%')
            ->where('sku_empresa', $sku)
            ->orderBy('id', 'DESC')
            ->get();

        return view('livewire.vista-rol-usuario', compact('rol_usuarios'));
    }



    public function clear()
    {
        $nombre_rol = "";
    }
    public function edit($id)
    {

        $rol_usuarios = RolUsuarios::find($id);

        $this->nombre_rol = $rol_usuarios->nombre_rol;
        $this->Id = $rol_usuarios->id;
    }


    public function update($id)
    {
        $validatedData = $this->validate();
        $rol_nombre = $this->nombre_rol;

        DB::beginTransaction();
        try {
            $NombreRoles = RolUsuarios::where('nombre_rol', '=', $rol_nombre)->find($id);
       //     dd($NombreRoles);


            if ($NombreRoles === null) {

                $NombreRoles = [
                    'nombre_rol' => $rol_nombre
                ];
                RolUsuarios::where('id', $id)->update($NombreRoles,$validatedData  );

                $this->clear();
                DB::commit();
                $this->reset(['nombre_rol']);
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
