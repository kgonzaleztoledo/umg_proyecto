@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Bienvenido {{ Session::get('nombre') }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard </li>
                            <li class="breadcrumb-item active">Fecha de Hoy: {{ $todayDate }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $empresas }}</h3> <span>Empresas Registras</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $EncabezadoPlanilla }}</h3> <span>Planillas Registradas</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$users}}</h3> <span>Usuarios Registrados</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-address-card"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$empleados}}</h3> <span>Empleados Registrados</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Los ingresos totales</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        Resumen de ventas</h3>
                                    <div id="line-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- Statistics Widget -->

            <!-- /Statistics Widget -->
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Ultimos 2 Usuarios </h3> </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID Usuario</th>
                                            <th>Usuario Nombre</th>

                                            <th>Fecha de Registro</th>
                                            <th>Estado</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_ultimos as $item )
                                        <tr>
                                            <td class="id">{{ $item->user_id }}</td>
                                            <td class="sku_sucursal">{{ $item->nombre  }}</td>



                                            <td class="puesto">{{ $item->fecha_ingreso }}</td>
                                            @if ($item->estado=='1')
                                            <td class="estado">Activo</td>
                                            @else

                                            <td class="estado">Inactivo</td>
                                            @endif


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('userManagement') }}">Ver todos los Usuarios</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Ultimos 2 Empleados Registrados</h3> </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID Usuario</th>
                                            <th>Nombre del Empleado</th>

                                            <th>Fecha Inicio Labores</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empleadosregistrados as $item )
                                        <tr>
                                            <td class="id">{{ $item->empleado_id }}</td>
                                            <td class="sku_sucursal">{{ $item->nombre_empleado  }}</td>

                                           <td class="puesto">{{ $item->fecha_inicio_laboral }}</td>



                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('todos/empleados/card') }}">Ver Empleados</a>
                        </div>
                    </div>
                </div>
            </div>

   <!-- /Statistics Widget -->

        </div>
        <!-- /Page Content -->
    </div>
@endsection
