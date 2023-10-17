<div>

    <div class="row filter-row">

        <div class="col-sm-4 col-md-4">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" wire:model="search">
                <label class="focus-label">Buscar</label>
            </div>

        </div>


        @livewire('create-rol-usuario')


    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE ROL USUARIO</th>
                            <th>FEHCA REGISTRO</th>

                            <th class="text-right no-sort">Acción:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rol_usuarios as $rol_usuario)
                            <tr>

                                <td>{{ $rol_usuario->id }}</td>
                                <td>{{ $rol_usuario->nombre_rol }}</td>
                                <td>{{ $rol_usuario->created_at }}</td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a class="dropdown-item"data-toggle="modal" data-target="#edit_roldescuento"
                                                wire:click='edit("{{ $rol_usuario->id }}")'> <i
                                                    class="fa fa-pencil m-r-5"></i>
                                                Editar</a>
                                            <a class="dropdown-item" href=""onclick=""><i
                                                    class="fa fa-trash-o m-r-5"></i> Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div id="edit_roldescuento" class="modal custom-modal fade" role="dialog" wire:ignore.self>
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar| Rol Usuario {{ $Id }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nombre Rol Usuario:</label>
                                                        <input
                                                            class="form-control @error('nombre_rol') is-invalid @enderror"
                                                            placeholder="Ingrese Tipo de Nombre Rol"
                                                            wire:model="nombre_rol" required>

                                                        @error('nombre_rol')
                                                            <span>{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn"
                                                    wire:click='update("{{ $Id }}")'>Actualizar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
