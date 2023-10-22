<?php

namespace App\Http\Livewire;

use App\Models\DetalleNomina;
use App\Models\Empleado;
use App\Models\EncabezadoPlanilla as EncabezadoPlanillas;
use \Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Empresa as Empresas;
use App\Models\TipoPlanilla;
use App\Models\DescuentoEmpleado;
use App\Models\NominaAsistencia;

use Brian2694\Toastr\Facades\Toastr;

use Livewire\Component;
use Session;

use Auth;

class CreateEncabezadoPlanilla extends Component
{


    public $tipo_planilla_id;

    public $periodo_inicial;

    public $periodo_final;
    public $mes;
    public $ano;

    public $employee_id;

    protected $rules = [
        'mes' => 'required',
        'ano' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save()
    {


        $this->validate();

        $tipo_planilla_id = $this->tipo_planilla_id;
        $periodo_inicial = $this->periodo_inicial;
        $periodo_final = $this->periodo_final;
        $mes = $this->mes;
        $ano = $this->ano;





        DB::beginTransaction();
          try {


            $sku_empresa = Auth::user()->empresa_id;


            $Empresas = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);

            $sku = $Empresas->sku_empresa;
          //  $SKU = $descrip . $sku;

          if ($Planilla = EncabezadoPlanillas::where('mes', '=', $mes)
             ->where('ano', '=', $ano)
               ->where('tipo_planilla_id', '=', $tipo_planilla_id)
                //where('sku_empres', '=', $sku)
              ->exists()

           ) {

                DB::rollback();
                Toastr::error('Planilla ya Registrada Validar Acción :(', 'Error');
                return redirect()->route('form/planillaselectronica/page');
            } else {

                $datetime = date('Y-m-d H:i:s');  //fecha y hora actual para registrar planilla

                $EncabezadoPlanillas = EncabezadoPlanillas::create([
                    'tipo_planilla_id' => $tipo_planilla_id,
                    'periodo_inicial' => $periodo_inicial,
                    'periodo_final' => $periodo_final,
                    'mes' => $mes,
                    'ano' => $ano,
                    'fecha_creacion' => $datetime,
                    'sku_empresa' => $sku
                ]);
                //formz mas sencilla y rapida de hacer el insert
                //$EncabezadoPlanillas->save();

                $empleados = Empleado::where('sku_empresa', '=', $sku)->get();

                foreach ($empleados as $empleado) {

                    $date = date("m");
                    $iggs = DescuentoEmpleado::where('empleados_id', $empleado->id)->where('descuentos_id', '1')->first();

                    $irtra = DescuentoEmpleado::where('empleados_id', $empleado->id)->where('descuentos_id', '2')->first();

                    $nominaasistenas = NominaAsistencia::where('empleado_id', $empleado->id)->where('mes',$date)->first();

                     $e_Salario = $empleado->salario;
                     if($iggs)
                     {
                        $DescuentoIgss = $empleado->salario * $iggs->porcentaje/100;
                     }
                     else{
                        $DescuentoIgss = 0.00;
                     }
                     if($irtra)
                     {
                        $DescuentoIrtra = $empleado->salario * $irtra->porcentaje/100;
                     }
                     else
                     {
                        $DescuentoIrtra = 0.00;
                     }


                    $totalDescuentos = $DescuentoIgss + $DescuentoIrtra;
                    $Bonoley = "250";
                    $horasextras = $nominaasistenas->h_extras*25;
                    $diasLaborados = $nominaasistenas->total_dias;
                    $SueldoLiquido = $e_Salario + $Bonoley + $horasextras - $totalDescuentos;
                    //dd($SueldoLiquido);

                //    $salarioLiqui = $empleado->salario-$des;
                    //aqui todo lo que vas a calcular para el salario
                    DetalleNomina::create([
                        'encabezado_nominas_id' => $EncabezadoPlanillas->id,
                        'empleado_id' => $empleado->id,
                        'sku_empresa' => $sku,
                        'total_descuento' => $totalDescuentos,
                        'dias_laborado' => $diasLaborados,
                        'bonificacion_ley' => $Bonoley,
                        'total_hrs_extras' => $horasextras,
                        'sueldo_liquido' => $SueldoLiquido,
                        'salario' => $e_Salario
                    ]);
                }

               DB::commit();
                $this->reset(['mes','ano']);


                $this->emitTo('vista-encabezado-planilla', 'render');
                $this->emit('alert-add');
            }
       } catch (\Exception $e) {
           DB::rollback();
            Toastr::error('Planilla Electronica ya Registrada  Validar Acción :(', 'Error');
        }
    }

    public function render()
    {

        $sku_empresa = Auth::user()->empresa_id;

            $Empresas = Empresas::where('id', '=', $sku_empresa)->find($sku_empresa);
            $sku = $Empresas->sku_empresa;

        $TipoPlanillas = DB::table('tipo_planillas')
                        ->where('sku_empresa', '=', $sku )
                        ->get();

       // dd($TipoPlanillas);
        return view('livewire.create-encabezado-planilla', compact('TipoPlanillas'));
    }
}
