<div>

    <div class="row filter-row">

        <div class="col-sm-4 col-md-4">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" wire:model="search">
                <label class="focus-label">Buscar</label>
            </div>

        </div>


        @livewire('create-puesto')


    </div>
    <br>
    <div class="row">
        <div class="col-md-10">
            <div class="table-responsive-lg ">
                <table class="table table-striped table-hover custom-table align-middle   datatable   " >
                    <thead>
                        <tr align="center">
                            <th >ID</th>
                            <th >NOMBRE DEL PUESTO</th>

                            <th >DESCRIPCIÓN</th>
                            <th >FEHCA REGISTRO</th>

                            <th class="text-right no-sort">Acción:</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($puestos as $puesto)
                            <tr>

                                <td>{{ $puesto->id }}</td>
                                <td>{{ $puesto->nombre }}</td>

                                <td align="justify" >{{ $puesto->descripcion }}</td>
                                <td>{{ $puesto->created_at }}</td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a class="dropdown-item"data-toggle="modal" data-target="#edit_puesto"
                                                wire:click='edit("{{ $puesto->id }}")'> <i
                                                    class="fa fa-pencil m-r-5"></i>
                                                Editar</a>
                                            <a class="dropdown-item" href=""onclick=""><i
                                                    class="fa fa-trash-o m-r-5"></i> Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div id="edit_puesto" class="modal custom-modal fade" role="dialog" wire:ignore.self>
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
                                                        <label>Nombre del Puesto:*</label>
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
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Descripción:</label>

                                                        <textarea class="form-control  @error('descripcion') is-invalid @enderror" placeholder="Ingrese Descripción"
                                                            wire:model="descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();" style="height: 200px" required></textarea>
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
