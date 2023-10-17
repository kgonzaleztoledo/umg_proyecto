<div>

    <div class="row filter-row">

        <div class="col-sm-4 col-md-4">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" wire:model="search">
                <label class="focus-label">Buscar</label>
            </div>

        </div>


        @livewire('create-tipo-planilla')


    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive-sm ">
                <table class="table table-striped table-hover custom-table align-middle   datatable   " >
                    <thead>
                        <tr align="center">
                            <th >ID</th>
                            <th >NOMBRE TIPO PLANILLA</th>


                            <th >FEHCA REGISTRO</th>

                            <th class="text-right no-sort">Acción:</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($planillas as $planilla)
                            <tr>

                                <td>{{ $planilla->id }}</td>
                                <td>{{ $planilla->nombre }}</td>

                                <td>{{ $planilla->created_at }}</td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a class="dropdown-item"data-toggle="modal" data-target="#edit_planilla"
                                                wire:click='edit("{{ $planilla->id }}")'> <i
                                                    class="fa fa-pencil m-r-5"></i>
                                                Editar</a>
                                            <a class="dropdown-item" href=""onclick=""><i
                                                    class="fa fa-trash-o m-r-5"></i> Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div id="edit_planilla" class="modal custom-modal fade" role="dialog" wire:ignore.self>
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar| Puestos {{ $Id }}
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
                                                        <label>Nombre Tipo Planilla:*</label>
                                                        <input
                                                            class="form-control @error('nombre') is-invalid @enderror"
                                                            placeholder="Ingrese el Nombre del Puesto"
                                                            wire:model="nombre" required>

                                                        @error('nombre')
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
