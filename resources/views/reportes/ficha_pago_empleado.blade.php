
@extends('layouts.exportmaster')
@section('content')
    <!-- Page Wrapper -->
    <div class="">
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid" id="app">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col" style="margin-left: -222px;">
                        <h3 class="page-title">Recibo Noómina</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('form/planillaselectronica/page') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Recibo Noómina</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white"><a href=""@click.prevent="printme" target="_blank">PDF</a></button>
                            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Imprimir</a></button>
                        </div>
                    </div>
                </div>

            <div class="row" style="margin-left: -240px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">Recibo de NOMINA</h4>
                            <h4 class="payslip-title">FECHA DE IMPRESION: {{ \Carbon\Carbon::now()->format('M') }}- {{ \Carbon\Carbon::now()->year }}  </h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    @if(!empty($DetallePLanillas->avatar))
                                    <img src="{{ URL::to('/assets/images/'. $DetallePLanillas->avatar) }}" class="inv-logo" alt="{{ $DetallePLanillas->nombre_empleado }}">
                                    @endif
                                    <ul class="list-unstyled mb-0">

                                        <li><h5>DETALLE DE INFOMACIÓN DEL EMPLEADO</h5></li>
                                        <li><h5>NOMBRE DEL EMPLEADO: {{ $DetallePLanillas->nombre_empleado }}</h5></li>
                                        <li>DOMICILIO:  {{ $DetallePLanillas->direccion }}</li>
                                        <li>NO. CUI:  {{ $DetallePLanillas->cui_dpi }}</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">No. #49029</h3>
                                        <ul class="list-unstyled">
                                            <li>Mes de salario: <span>{{$DetallePLanillas->mes }}  , {{ $DetallePLanillas->ano}}  </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">

                                        <li><h5 class="mb-0"><strong>INFORMACIÓN LABORAL:</strong></h5></li>
                                        <li><h5 class="mb-0"><strong>{{ $DetallePLanillas->nombre_empleado }}</strong></h5></li>
                                        <li><span>DEPARTAMENTO: {{ $DetallePLanillas->departamento }}</span></li>
                                        <li><span>PUESTO:  {{ $DetallePLanillas->puesto }}</span></li>
                                        <li>Codigo Empleado {{ $DetallePLanillas->empleado_id }}</li>
                                        <li>Dia de ingreso: {{ $DetallePLanillas->fecha_inicio_laboral }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>PERCEPCIONES</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                    $a =  (int)$DetallePLanillas->salario;
                                                    $b =  (int)$DetallePLanillas->bono;
                                                    $c =  (int)$DetallePLanillas->h_extras;
                                                    $TotalPercepciones = $a + $b + $c;
                                                ?>
                                                <tr>
                                                    <td><strong>SALARIO BASE:</strong> <span class="float-right">Q.{{ $DetallePLanillas->salario }}</span></td>
                                                </tr>
                                                <tr>

                                                    <td><strong>BONIFICACION MENSUAL: DECRETO 37-2001:</strong> <span class="float-right">Q.{{ $DetallePLanillas->bono }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>HORAS EXTRAS</strong> <span class="float-right">Q.{{ $DetallePLanillas->h_extras }}</span></td>
                                                </tr>

                                                <tr>
                                                    <td><strong>TOTAL PERCEPCIONES</strong> <span class="float-right"><h3>Q. <?php echo $TotalPercepciones; ?></h3></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>DEDUCCIONES</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                    $iggs =  (int)$DetallePLanillas->salario * 4.83/100;
                                                    $irtra =  (int)$DetallePLanillas->salario * 1/100;
                                                    $TotalDeducciones   = $iggs + $irtra;
                                                ?>
                                                <tr>
                                                    <td><strong>IRTRA</strong> <span class="float-right">Q.<?php echo $iggs;?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>IGGS</strong> <span class="float-right">Q.<?php echo $irtra;?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>CREDITO</strong> <span class="float-right">Q.0.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>TIENDA SOLIDARIA</strong> <span class="float-right">Q.0.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>TOTAL DEDUCCIONES:</strong> <span class="float-right"><strong>Q.<?php echo $TotalDeducciones;?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" >
                                    <p><h3>SUELDO LIQUIDO: Q.<?php $sueldoliquido = $TotalPercepciones-$TotalDeducciones; echo $sueldoliquido;?>  (Total de Salario Nominal.)</h3> </p>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-sm-6" >
                                    <br><br><br><br><br><br><br><br><br>
                                    <p><h3>f:_____________________________</h3> </p>

                                    <p><h3>Firma del Empleado</h3> </p>
                                </div>
                                <div class="col-sm-6" >

                                    <br><br><br><br><br><br><br><br><br>
                                    <p><h3>f:_____________________________</h3> </p>

                                    <p><h3>Departamento de recursos Humanos</h3> </p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    </div>
@endsection
