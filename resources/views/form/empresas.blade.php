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
                        <h3 class="page-title">Gestión de Empresa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Empresas:</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <!-- /Inicia Modal para agregar usuario -->
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Agregar Empresa</a>
                        <!-- /Fin para agregar Usuario -->
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="{{ route('search/empresas/list') }}" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" id="nombre" name="nombre">
                            <label class="focus-label">Nombre de usuario</label>
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

            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Nombre de la Empresa</th>
                                    <th>ID Empresa</th>
                                    <th hidden></th>
                                    <th>Contacto</th>
                                    <th>Correo Electronico</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th class="text-right">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empresas as $key=>$empresa )
                                <tr>
                                    <td>
                                        <span hidden class="image">{{ $empresa->logo}}</span>
                                        <h2 class="table-avatar">
                                            <a href="#" class="avatar"><img src="{{ URL::to('/assets/images/'. $empresa->logo) }}" alt="{{ $empresa->logo }}"></a>
                                            <a href="#" class="name">{{ $empresa->nombre }}</span></a>
                                        </h2>
                                    </td>
                                    <td hidden class="ids">{{ $empresa->sku_empresa }}</td>

                                    <td  class="ids">{{ $empresa->sku_empresa }}</td>
                                    <td class="id">{{ $empresa->contacto_persona }}</td>
                                    <td class="email">{{ $empresa->email }}</td>
                                    <td class="position">{{ $empresa->telefono }}</td>
                                    <td class="phone_number">{{ $empresa->direccion }}</td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item empresaUpdate" data-toggle="modal" data-id="'.$empresa->id.'" data-target="#edit_empresa"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                                <a class="dropdown-item empresaDelete" href="#" data-toggle="modal" ata-id="'.$empresa->id.'" data-target="#delete_empresa"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a>
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
        <!-- /Page Content -->


        <!-- Add User Modal -->

        <!-- /Delete User Modal -->
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    {{-- update js --}}
    <script>
        $(document).on('click','.userUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_phone_number').val(_this.find('.phone_number').text());
            $('#e_image').val(_this.find('.image').text());

            var name_role = (_this.find(".role_name").text());
            var _option = '<option selected value="' + name_role+ '">' + _this.find('.role_name').text() + '</option>'
            $( _option).appendTo("#e_role_name");

            var position = (_this.find(".position").text());
            var _option = '<option selected value="' +position+ '">' + _this.find('.position').text() + '</option>'
            $( _option).appendTo("#e_position");

            var department = (_this.find(".department").text());
            var _option = '<option selected value="' +department+ '">' + _this.find('.department').text() + '</option>'
            $( _option).appendTo("#e_department");

            var statuss = (_this.find(".statuss").text());
            var _option = '<option selected value="' +statuss+ '">' + _this.find('.statuss').text() + '</option>'
            $( _option).appendTo("#e_status");

        });
    </script>
    {{-- delete js --}}
    <script>
        $(document).on('click','.userDelete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.ids').text());
            $('.e_avatar').val(_this.find('.image').text());
        });
    </script>
    @endsection

@endsection
