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
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_empresa"><i class="fa fa-plus"></i> Agregar Empresa</a>
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
                                    <th>Movil</th>
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
                                        <span hidden class="logo">{{ $empresa->logo}}</span>
                                        <h2 class="table-avatar">
                                            <a href="#" class="avatar"><img src="{{ URL::to('/assets/images/'. $empresa->logo) }}" alt="{{ $empresa->logo }}"></a>
                                            <a href="#" class="nombre">{{ $empresa->nombre }}</span></a>
                                        </h2>
                                    </td>
                                    <td hidden class="ids">{{ $empresa->id }}</td>
                                    <td hidden class="sitio_web">{{ $empresa->sitio_web }}</td>
                                    <td  class="sku_empresa">{{ $empresa->sku_empresa }}</td>
                                    <td class="contacto_persona">{{ $empresa->contacto_persona }}</td>
                                    <td class="movil">{{ $empresa->movil }}</td>
                                    <td class="email">{{ $empresa->email }}</td>
                                    <td class="telefono">{{ $empresa->telefono }}</td>
                                    <td class="direccion">{{ $empresa->direccion }}</td>

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


        <div id="add_empresa" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar nueva Empresa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/empresas/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre completo Empresa:</label>
                                        <input class="form-control @error('nombre') is-invalid @enderror" type="text" id="" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese Nombre" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Correo Electronico:</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Ingrese Email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Contacto:</label>
                                    <input class="form-control @error('contacto_persona') is-invalid @enderror" type="text" id="contacto_persona" name="contacto_persona" value="{{ old('contacto_persona') }}" placeholder="Ingrese contacto">
                                </div>
                                <div class="col-sm-6">
                                    <label>Movil:</label>
                                    <input class="form-control @error('movil') is-invalid @enderror" type="number" id="movil" name="movil" value="{{ old('movil') }}" placeholder="Ingrese movil">
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Teléfono Empresa:</label>
                                        <input class="form-control @error('telefono') is-invalid @enderror" type="number" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="Ingrese Teléfono">

                                    </div>
                                </div>
                                <div class="col-sm-8">

                                       <label>Direccion:</label>
                                        <textarea class="form-control  @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}"  placeholder="Ingrse Direccion" >

                                        </textarea>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Sitio Web:</label>
                                        <input class="form-control @error('sitio_web') is-invalid @enderror" type="text" id="sitio_web" name="sitio_web" value="{{ old('sitio_web') }}" placeholder="Ingrese Sitio WEB">

                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-sm-12">
                                    <label>Fotografia:</label>
                                    <input class="form-control dropify" type="file" id="logo" name="logo">
                                </div>
                            </div>
                            <br>

                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add User Modal -->

        <!-- Editar Usarior Modal -->
        <div id="edit_empresa" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Empresa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-body">
                        <form action="{{ route('form/empresa/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="sku_empresa" id="e_sku_empresa" value="">
                            <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre completo Empresa:</label>
                                        <input class="form-control" type="text" name="nombre" id="e_nombre" value="" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Correo Electronico:</label>
                                    <input class="form-control" type="text" name="email" id="e_email" value="" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Contacto:</label>
                                    <input class="form-control" type="text" id="e_contacto_persona" name="contacto_persona" value="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Movil:</label>
                                    <input class="form-control" type="number" id="e_movil" name="movil" value="" >
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Teléfono Empresa:</label>
                                        <input class="form-control" type="number" id="e_telefono" name="telefono" value="" >

                                    </div>
                                </div>
                                <div class="col-sm-8">

                                       <label>Direccion:</label>
                                        <textarea class="form-control" id="e_direccion" name="direccion" value=""  >

                                        </textarea>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Sitio Web:</label>
                                        <input class="form-control" type="text" id="e_sitio_web" name="sitio_web" value="" >

                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">
                                    <label>Logo Empresa</label>
                                    <input class="form-control dropify " type="file" id="logos" name="logos">
                                    <input type="hidden" name="hidden_logo" id="e_image" value="">
                                </div>
                            </div>
                            <br>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Salary Modal -->

        <!-- Delete User Modal -->

        <div class="modal custom-modal fade" id="delete_empresa" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Borrar Empresa</h3>
                            <p>¿Estás seguro de que quieres eliminar?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('form/empresa/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" class="e_iddelete" value="">
                                <input type="hidden" name="logo" class="e_logo" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Eliminar</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- /Delete User Modal -->
    </div>



    <!-- /Page Wrapper -->
    @section('script')

    <!-- /LLama la funcion de libreria dropify de imagen -->
    <script src="{{asset('assets/js/dropify.js')}}"></script>

    {{-- update js --}}
    <script>
        $(document).on('click','.empresaUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_sku_empresa').val(_this.find('.sku_empresa').text());
            $('#e_nombre').val(_this.find('.nombre').text());
            $('#e_email').val(_this.find('.email').text());

            $('#e_contacto_persona').val(_this.find('.contacto_persona').text());
            $('#e_movil').val(_this.find('.movil').text());
            $('#e_telefono').val(_this.find('.telefono').text());
            $('#e_direccion').val(_this.find('.direccion').text());

            $('#e_sitio_web').val(_this.find('.sitio_web').text());

            $('#e_image').val(_this.find('.logo').text());



        });
    </script>
    {{-- delete js --}}
    <script>
        $(document).on('click','.empresaDelete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_iddelete').val(_this.find('.ids').text());
            $('.e_logo').val(_this.find('.logo').text());
        });
    </script>


    @endsection


@endsection
