<div class="col-sm-4 col-md-3">
    {!! Toastr::message() !!}
    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_descuento"><i class="fa fa-plus"></i> Agregar Tipo Planilla</a>

    <div id="add_descuento" class="modal custom-modal fade" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Tipo Planilla</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nombre Tipo Planilla:</label>
                                <input class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Ingrese Tipo Planilla" wire:model="nombre"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                @error('nombre')
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
