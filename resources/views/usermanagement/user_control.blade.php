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
                        <h3 class="page-title">Gestión de usuarios</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Usuario:</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <!-- /Inicia Modal para agregar usuario -->
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Agregar usuario</a>
                        <!-- /Fin para agregar Usuario -->
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="{{ route('search/user/lista') }}" method="POST">
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
                            <input type="text" class="form-control floating" id="nombre_rol" name="nombre_rol">
                            <label class="focus-label">Nombre de rol</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <select class="form-control floating" name="estado" id="estado">
                                <option selected disabled> --Selecciones Tipo Estado --</option>

                                <option value="1">ACTIVO</option>
                                <option value="0">INACTIVO</option>

                            </select>
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
                                    <th>ID Usuario</th>
                                    <th>Empresa</th>
                                    <th>Nombre Completo</th>
                                    <th hidden></th>
                                    <th>Puesto</th>
                                    <th>Departamento</th>
                                    <th>Correo Electronico</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th class="text-right">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key=>$user )
                                <tr>
                                    <td class="id">{{ $user->user_id }}</td>
                                    <td class="sku_sucursal">{{ $user->sucursal  }}</td>
                                    <td>
                                        <span hidden class="image">{{ $user->avatar}}</span>
                                        <h2 class="table-avatar">
                                            @if(!empty( $user->avatar))
                                            <a href="{{ url('empleado/perfil/'.$user->user_id) }}" class="avatar"><img src="{{ URL::to('/assets/images/'. $user->avatar) }}" alt="{{ $user->avatar }}"></a>

                                              @else
                                              <a href="{{ url('empleado/perfil/'.$user->user_id) }}" class="avatar"><img src="{{asset('/assets/images/img_n.jpg')}}" alt="img_n"></a>

                                             @endif
                                            <a href="{{ url('empleado/perfil/'.$user->user_id) }}" class="nombre">{{ $user->nombre }}</span></a>
                                        </h2>
                                    </td>
                                    <td hidden class="ids">{{ $user->id }}</td>


                                    <td class="puesto">{{ $user->puesto }}</td>
                                    <td class="departamento">{{ $user->departamento }}</td>
                                    <td class="email">{{ $user->email }}</td>
                                    <td class="fecha_ingreso">{{ $user->fecha_ingreso}}</td>

                                    <td>
                                        @if ($user->nombre_rol=='Admin')
                                            <span class="badge bg-inverse-danger nombre_rol">{{ $user->nombre_rol }}</span>
                                            @elseif ($user->nombre_rol=='Super Admin')
                                            <span class="badge bg-inverse-warning nombre_rol">{{ $user->nombre_rol }}</span>
                                            @elseif ($user->nombre_rol=='Normal User')
                                            <span class="badge bg-inverse-info nombre_rol">{{ $user->nombre_rol }}</span>
                                            @elseif ($user->nombre_rol=='Client')
                                            <span class="badge bg-inverse-success nombre_rol">{{ $user->nombre_rol }}</span>
                                            @elseif ($user->nombre_rol=='Empleado')
                                            <span class="badge bg-inverse-dark nombre_rol">{{ $user->nombre_rol }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown action-label">
                                            @if ($user->estado=='1')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-success"></i>
                                                    <span class="statuss">ACTIVO</span>


                                                </a>
                                                @elseif ($user->estado=='0')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-warning "></i>
                                                    <span class="statuss">INACTIVO</span>
                                                </a>

                                                @elseif ($user->estado=='')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i>
                                                    <span class="statuss">N/A</span>
                                                </a>
                                            @endif

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-dot-circle-o text-success"></i> Active
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-dot-circle-o text-warning"></i> Inactive
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-dot-circle-o text-danger"></i> Disable
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$user->id.'" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                                <a class="dropdown-item userDelete" href="#" data-toggle="modal" ata-id="'.$user->id.'" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a>
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
        <div id="add_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <i class="bi bi-file-earmark-plus-fill"> Agregar nuevo usuario </i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre Completo:</label>
                                        <input class="form-control @error('nombre') is-invalid @enderror" type="text" id="" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese nombre" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Email:</label>
                                    <input class="form-control @error('email') is-invalid @enderror"  type="email" id="" name="email"value="{{ old('email') }}" placeholder="Ingrese Email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Nombre del Rol</label>
                                    <select class="select" name="nombre_rol" id="nombre_rol">
                                        <option selected disabled> --Select --</option>
                                        @foreach ($roles as $rol )
                                        <option value="{{ $rol->nombre_rol }}">{{ $rol->nombre_rol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Puesto:</label>
                                    <select class="select" name="puesto" id="puesto">
                                        <option selected disabled> --Select --</option>
                                        @foreach ($puestos as $puesto )
                                        <option value="{{ $puesto->nombre }}">{{ $puesto->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">


                                    <div class="col-sm-6">
                                        <label>Empresa:</label>
                                        <select class="select" name="empresa" id="empresa">
                                            <option selected disabled> --Select --</option>
                                            @foreach ($empresas as $empresa )
                                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                    <label>Área Departamento:</label>
                                    <select class="select" name="departamento" id="departamento">
                                        <option selected disabled> --Select --</option>
                                        @foreach ($departamentos as $departamento )
                                        <option value="{{ $departamento->nombre }}">{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Estado:</label>
                                    <select class="select" name="estado" id="estado">
                                        <option selected disabled> --Seleccione --</option>

                                            <option value="1">Activo</option>
                                            <option value="0" selected>Inactivo</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Fotografía:</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="images" required>
                                    <input class="form-control" type="hidden" id="hidden_image" name="hidden_image">
                                </div>
                            </div>
                            <br>




                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Choose Repeat Password">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Guardar Registro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add User Modal -->

        <!-- Editar Usuario Lista Modal -->
        <div id="edit_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-body">
                        <form action="{{ route('updateUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" id="e_id" value="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre Usuario:</label>
                                        <input class="form-control" type="text" name="nombre" id="e_name" value="" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="email" id="e_email" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Rol Usuario:</label>
                                    <select class="select" name="nombre_rol" id="e_role_name">
                                        @foreach ($roles as $rol )
                                        <option value="{{ $rol->nombre_rol }}">{{ $rol->nombre_rol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Puesto:</label>
                                    <select class="select" name="puesto" id="e_position">
                                        @foreach ($puestos as $puesto )
                                        <option value="{{ $puesto->nombre }}">{{ $puesto->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha Registro:</label>
                                        <input class="form-control" type="text" id="e_fecha_ingreso" name="fecha_ingreso" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Area Departamento</label>
                                    <select class="select" name="departamento" id="e_department">
                                        @foreach ($departamentos as $departamento )
                                        <option value="{{ $departamento->nombre }}">{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-12">
                                    <label>Avatar</label>
                                    <input class="form-control" type="file" id="image" name="images">
                                    <input type="hidden" name="hidden_image" id="e_image" >
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
        <div class="modal custom-modal fade" id="delete_user" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Eliminar Usuario</h3>
                            <p>¿Estás segura de que quieres eliminar?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('user/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" class="e_id" value="">
                                <input type="hidden" name="avatar" class="e_avatar" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Elimnar</button>
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
    {{-- update js --}}
    <script>
        $(document).on('click','.userUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.nombre').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_fecha_ingreso').val(_this.find('.fecha_ingreso').text());
            $('#e_image').val(_this.find('.image').text());

            var name_role = (_this.find(".nombre_rol").text());
            var _option = '<option selected value="' + name_role+ '">' + _this.find('.nombre_rol').text() + '</option>'
            $( _option).appendTo("#e_role_name");

            var position = (_this.find(".puesto").text());
            var _option = '<option selected value="' +position+ '">' + _this.find('.puesto').text() + '</option>'
            $( _option).appendTo("#e_position");

            var department = (_this.find(".departamento").text());
            var _option = '<option selected value="' +department+ '">' + _this.find('.departamento').text() + '</option>'
            $( _option).appendTo("#e_department");

            var statuss = (_this.find(".estado").text());
            var _option = '<option selected value="' +statuss+ '">' + _this.find('.estado').text() + '</option>'
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
