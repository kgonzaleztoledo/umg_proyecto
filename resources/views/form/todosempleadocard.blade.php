@extends('layouts.master')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-lists-center">
                    <div class="col">
                        <h3 class="page-title">Empleados</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Empleados:</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Gestionar Empleado</a>
                        <div class="view-icons">
                            <a href="{{ route('todos/empleados/card') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="#" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="{{ route('all/empleado/search') }}" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="empleado_id">
                            <label class="focus-label">Id Empleado</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="nombre">
                            <label class="focus-label">Nombres y apellido Empleado</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="puesto">
                            <label class="focus-label">Puesto</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="sumit" class="btn btn-success btn-block"> Buscar </button>
                    </div>
                </div>
            </form>
            <!-- Search Filter -->
            {{-- message --}}
            {!! Toastr::message() !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive-xl">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Nombres Completo</th>
                                    <th>Direccion</th>
                                    <th>Cargo</th>
                                    <th>Información</th>
                                    <th>Salario</th>

                                    <th class="text-right no-sort">Acción:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $items )
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{ url('empleado/perfil/'.$items->user_id) }}" class="avatar"><img alt="" src="{{ URL::to('/assets/images/'. $items->avatar) }}"></a>
                                            <a href="{{ url('empleado/perfil/'.$items->user_id) }}">{{ $items->nombre }}<span>{{ $items->puesto }}</span></a>
                                        </h2>
                                    </td>

                                    <td>{{ $items->direccion }}</td>
                                    <td>{{ $items->puesto_designado }}</td>
                                    <td>contrato:{{ $items->tipo_contrato }}<br>t-pago:{{ $items->tipo_pago }}</td>
                                    <td>Q.{{ $items->salario }}  </td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                                <a class="dropdown-item" href="{{url('todos/empleados/delete/'.$items->user_id)}}"onclick="return confirm('¿Estás seguro de que quieres eliminarlo?')"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a>
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

        <!-- Agregar Empleado abre  Modal -->
        <div id="add_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Empleado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('todos/empleado/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h5> <label class="col-form-label">DATOS PERSONALES:</label></h5>

                                        <label class="col-form-label">Nombre del Empleado:<span class="text-danger">*</span></label>
                                        <select  class="select select2s-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="select_name" name="nombre_empleado">
                                            <option value="">-- Select --</option>
                                            @foreach ($userList as $key=>$user )
                                                <option value="{{ $user->nombre_usuario }}"

                                                    data-user_id={{ $user->id }}
                                                    data-empleado_id={{ $user->user_id }}
                                                    data-sku_empresa={{ $user->sku_empresa }}
                                                    data-genero={{ $user->genero }}
                                                    data-cui_dpi={{ $user->cui_dpi }}
                                                    data-no_cuenta={{ $user->no_cuenta }}
                                                    data-tipo_cuenta={{ $user->tipo_cuenta }}
                                                    data-telefono_movil={{ $user->telefono_movil }}
                                                    data-email={{ $user->email }}>
                                                    {{ $user->nombre_usuario }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" id="user_id" name="user_id"  readonly>
                                        <input class="form-control" type="hidden" id="sku_empresa" name="sku_empresa"  readonly>


                                        <label class="col-form-label">Codigo Empleado:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="empleado_id" name="empleado_id" required readonly required>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email" required readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="col-form-label">DPI:<span class="text-danger">*</span></label>

                                            <input class="form-control" type="text" id="cui_dpi" name="cui_dpi"  required readonly>

                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-form-label">Género: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="genero" name="genero" required  readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-form-label">No Cuenta: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="no_cuenta" name="no_cuenta"required readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Tipo Cuenta: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="tipo_cuenta" name="tipo_cuenta" required readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="row">



                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Teléfono Móvil: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="celular" name="celular" required readonly>
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="col-form-label">Domicilio: <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="direccion" name="direccion" rows="3" cols="20" required></textarea>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h5><label class="col-form-label">DATOS LABORALES:</label></h5>

                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Area:<span class="text-danger">*</span></label>
                                        <select class="select" name="departamento" id="departamento" @required(true)>
                                            <option selected disabled> --Select --</option>
                                            @foreach ($departamentos as $departamento )
                                            <option value="{{ $departamento->nombre }}">{{ $departamento->nombre }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Puesto: <span class="text-danger">*</span></label>
                                        <select class="select " name="puesto" id="puesto" required>
                                            <option selected disabled> --Select --</option>
                                            @foreach ($puestos as $puesto )
                                            <option value="{{ $puesto->nombre }}">{{ $puesto->nombre }}</option>
                                            @endforeach
                                        </select>
                                               </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Fech. Inicio Labores: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" id="fecha_inicio_laboral" name="fecha_inicio_laboral" required >
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Tipo de Contrato:<span class="text-danger">*</span></label>

                                              <select class="select form-control" style="width: 100%;" tabindex="-1"  id="tipo_contrato" name="tipo_contrato" required>
                                                <option value="Indefenido">Indefenido</option>
                                                <option value="Temporal">Temporal</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Tipo Pago: <span class="text-danger">*</span></label>
                                         <select class="select form-control" style="width: 100%;" tabindex="-1"  id="tipo_pago" name="tipo_pago" required>
                                            <option value="Mensual">Mensual</option>
                                            <option value="Quincenal">Quincenal</option>
                                            <option value="Semanal">Semanal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Salario: Q. <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" id="salario" name="salario" required  >
                                    </div>
                                </div>


                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Employee Modal -->

    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        $("input:checkbox").on('click', function()
        {
            var $box = $(this);
            if ($box.is(":checked"))
            {
                var group = "input:checkbox[class='" + $box.attr("class") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            }
            else
            {
                $box.prop("checked", false);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2s-hidden-accessible').select2({
                closeOnSelect: false
            });
        });

        </script>


    <script>
        // select auto id and email
        $('#select_name').on('change',function()
        {

            $('#user_id').val($(this).find(':selected').data('user_id'));
            $('#empleado_id').val($(this).find(':selected').data('empleado_id'));

            $('#sku_empresa').val($(this).find(':selected').data('sku_empresa'));

            $('#genero').val($(this).find(':selected').data('genero'));

            $('#cui_dpi').val($(this).find(':selected').data('cui_dpi'));

            $('#no_cuenta').val($(this).find(':selected').data('no_cuenta'));

            $('#tipo_cuenta').val($(this).find(':selected').data('tipo_cuenta'));

            $('#celular').val($(this).find(':selected').data('telefono_movil'));

            $('#email').val($(this).find(':selected').data('email'));

        });
    </script>
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
    @endsection

@endsection
