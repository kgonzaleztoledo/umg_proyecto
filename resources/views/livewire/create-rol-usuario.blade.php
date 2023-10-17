<div class="col-sm-4 col-md-3">
    {!! Toastr::message() !!}
    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_descuento"><i class="fa fa-plus"></i> Nuevo
        Rol Usuario</a>

    <div id="add_descuento" class="modal custom-modal fade" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Rol Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nombre Rol Usuario:</label>
                                <input class="form-control @error('nombre_rol') is-invalid @enderror"
                                    placeholder="Ingrese Nuevo Rol Usuario" wire:model="nombre_rol" required>
                                @error('nombre_rol')
                                    <span>{{ $message }} </span>
                                @enderror
                            </div>
                        </div>


                    </div>


                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" wire:click="save">Registrar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>





</div>
