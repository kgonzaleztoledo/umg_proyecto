<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Descuento as Descuentos;
use \Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Empresa;
//use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Session;

use Brian2694\Toastr\Facades\Toastr;

use Auth;
class VistaDescuento extends Component
{
    public $search = "";

    public $Id;

    public $descripcion;

    protected $listeners = ['render'];
    protected $rules = [
        'descripcion' => 'required|min:4|max:50'
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


     //   dd($sku);

        $descuentos = Descuentos::where('descripcion', 'like', '%' . $this->search . '%')
            ->where('sku_empresa',$sku)
            ->orderBy('id', 'DESC')
            ->get();

        //            dd($descuentos);
        // dd($descuentos);
        return view('livewire.vista-descuento', compact('descuentos'));
    }

    public function clear()
    {
        $descripcion = "";
    }
    public function edit($id)
    {

        $descuento = Descuentos::find($id);

        $this->descripcion = $descuento->descripcion;
        $this->Id = $descuento->id;
    }


    public function update($id)
    {

        $validatedData = $this->validate();
        $descrip = $this->descripcion;

        DB::beginTransaction();
        try {
            $descuento = Descuentos::where('descripcion', '=', $descrip)->find($id);

         //   dd($descuento);

            if ($descuento === null) {

                $descuento = [
                    'descripcion' => $descrip
                ];
                Descuentos::where('id', $id)->update($descuento,$validatedData);

                $this->clear();
                DB::commit();
                $this->reset(['descripcion']);
                $this->emitTo('vista-descuento', 'render');
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
