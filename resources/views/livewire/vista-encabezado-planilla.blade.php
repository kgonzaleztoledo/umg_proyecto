<div>

    <div class="row filter-row">

        <div class="col-sm-4 col-md-4">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" wire:model="search">
                <label class="focus-label">Buscar</label>
            </div>

        </div>
        @livewire('create-encabezado-planilla')


    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>MES</th>
                            <th>TIPO PLANILLA</th>
                            <th>AÑO</th>
                            <th>FECHA CREACIÓN</th>
                            <th>ESTADO</th>

                            <th class="text-right no-sort">Acción:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($EncabezadoPLanillas as $item)
                            <tr>

                                <td>{{ $item->mes }}</td>

                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->ano }}</td>
                                <td>{{ $item->fecha_creacion }}</td>
                                <td>{{ $item->estado }}</td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ url('todos/planillasdetalle/mostrar/view/'. $item->id ) }}"><i class="fa fa-pencil m-r-5"></i> Ver Detalles</a>

                                            <a class="dropdown-item" href=""onclick=""><i
                                                    class="fa fa-trash-o m-r-5"></i> Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div id="edit_descuento" class="modal custom-modal fade" role="dialog" wire:ignore.self>
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit| Nuevo Tipo de Descuento {{ $Id }}
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
                                                        <label>Nombre del Descuento:</label>
                                                        <input
                                                            class="form-control @error('descripcion') is-invalid @enderror"
                                                            placeholder="Ingrese Tipo de Descuento"
                                                            wire:model="descripcion"
                                                            onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                            required>

                                                        @error('descripcion')
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
