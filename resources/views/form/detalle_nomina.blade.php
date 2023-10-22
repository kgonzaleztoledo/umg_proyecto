@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ route('form/descuentos/page') }}">
                            <h3 class="page-title">Detalle Planilla Electronica</h3>
                        </a>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detalle Electronica Nómina</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <!-- /Inicia Modal para agregar usuario -->
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i> Agregar Empleado Planilla</a>
                        <!-- /Fin para agregar Usuario -->
                    </div>

                </div>
            </div>
   <!-- Buscador de Filtros  -->
   <form action="{{ route('search/empresas/list') }}" method="POST">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" id="nombre" name="nombre">
                <label class="focus-label">Nombre de la Empresa</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" id="sku_empresa" name="sku_empresa">
                <label class="focus-label">Codigo Empresa</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" id="name" name="email">
                <label class="focus-label">Email</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <button type="sumit" class="btn btn-success btn-block"> Buscar </button>
        </div>
    </div>
</form><!-- /Filtro de búsqueda -->
{{-- message --}}
            <div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive-xl">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>EMPLEADO</th>
                                        <th>TIPO PLANILLA</th>
                                        <th>FECHA CREACIÓN</th>

                                        <th>SALARIO DEVENGADO</th>

                                        <th>DEDUCCIONES</th>
                                        <th>SUELDO LIQUIDO</th>
                                        <th>DIAS LABORADOS</th>

                                        <th class="text-right no-sort">Acción:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($DetallePLanillas as $item)
                                        <tr>

                                            <td>{{ $item->nombre_empleado }}</td>

                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->fecha_creacion }}</td>
                                            <td>Q.{{ $item->salario }}</td>
                                            <td>-Q.{{ $item->total_descuento }}</td>

                                            <td>Q.{{ $item->sueldo_liquido }}</td>
                                            <td>{{ $item->dias_laborado }} días laborados</td>




                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                        aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('mostrar/impimir/empleado/'. $item->imprimirid ) }}"><i class="fa fa-print m-r-5"></i> Imprimir</a>

                                                        <a class="dropdown-item" href=""onclick=""><i
                                                                class="fa fa-pencil-o m-r-5"></i> Editar</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
@endsection

@section('script')
    <script>
        Livewire.on('alert-add', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Dato Registrado Éxitoso',
                showConfirmButton: false,
                timer: 2400
            }).then(function(result) {
                if (true) {
                    window.location = '{{ url('form/planillaselectronica/page') }}';
                }
            })

        })

        Livewire.on('alert-update', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Dato Actualizado Correctamente ',
                showConfirmButton: false,
                timer: 2400
            }).then(function(result) {
                if (true) {
                    window.location = '{{ url('form/planillaselectronica/page') }}';
                }
            })

        })

        Livewire.on('alert-error', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'El nombre del Registro lo esta duplicando',
                showConfirmButton: false,
                timer: 2400
            })

        })
    </script>
@endsection
