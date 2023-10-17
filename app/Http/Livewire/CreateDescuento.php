<?php

namespace App\Http\Livewire;

use App\Models\Descuento as Descuentos;
use \Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Empresa;

use Brian2694\Toastr\Facades\Toastr;

use Livewire\Component;
use Session;
use Auth;

class CreateDescuento extends Component
{

    public $descripcion;

    protected $rules = [
        'descripcion' => 'required|min:4|max:50'
    ];

    protected $messages = [
        'descripcion.required' => 'The Email Address cannot be empty.'

    ];

    protected $validationAttributes = [
        'descripcion' => 'descripcion'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $validatedData = $this->validate();

        $descrip = $this->descripcion;
        DB::beginTransaction();
        try {


            $sku_empresa = Auth::user()->empresa_id;


            $Empresa = Empresa::where('id', '=', $sku_empresa)->find($sku_empresa);

            $sku = $Empresa->sku_empresa;
            $SKU = $descrip . $sku;

            if ($Descuento = Descuentos::where('descripcion', '=', $descrip)
                ->where('sku_empresa', '=', $sku)
                //where('sku_empres', '=', $sku)
                ->exists()
            ) {

                DB::rollback();
                Toastr::error('Categoria ya registrada Validar Acción :(', 'Error');
                return redirect()->route('form/descuentos/page');
            } else {

                $Descuento = new Descuentos;


                $Descuento->descripcion = $descrip;

                $Descuento->sku_empresa = $sku;

                $Descuento->save($validatedData);


                DB::commit();
                $this->reset(['descripcion']);


                $this->emitTo('vista-descuento', 'render');
                $this->emit('alert-add');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Categoria ya registrada  Validar Acción :(', 'Error');
        }
    }


    public function render()
    {
        return view('livewire.create-descuento');
    }
}
