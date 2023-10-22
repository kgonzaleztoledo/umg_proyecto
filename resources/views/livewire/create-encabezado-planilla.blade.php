<div class="col-sm-4 col-md-3">
    {!! Toastr::message() !!}
    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_descuento"><i class="fa fa-plus"></i> Agregar
        Planilla</a>

    <div id="add_descuento" class="modal custom-modal fade" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agrega Planilla Electrónica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">

                    <div class="row">



                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>PERIODO INCIAL:</label>
                                <input class="form-control @error('periodo_inicial') is-invalid @enderror" type="date"  min="2022-01-01" max="2023-12-31"
                                 wire:model.ignore="periodo_inicial"
                                required>
                            @error('periodo_inicial')
                                <span>{{ $message }} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>PERIODO FINAL:</label>
                                <input class="form-control @error('periodo_final') is-invalid @enderror" type="date"  min="2022-01-01" max="2023-12-31"
                                 wire:model.ignore="periodo_final"
                                required>
                            @error('periodo_final')
                                <span>{{ $message }} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>TIPO PLANILLA:</label>

                                <select class="select form-control @error('tipo_planilla_id') is-invalid @enderror" wire:model.ignore="tipo_planilla_id" required>
                                    <option selected disabled> --Select --</option>
                                    @foreach ($TipoPlanillas as $TipoPlanilla )
                                    <option value="{{ $TipoPlanilla->id }}">{{ $TipoPlanilla->nombre }}</option>
                                    @endforeach
                                </select>

                                     @error('tipo_planilla_id')
                                    <span>{{ $message }} </span>
                                @enderror
                            </div>
                        </div>







                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>MES:</label>

                                <select class="select form-control @error('mes') is-invalid @enderror" id="cars" wire:model.ignore="mes" required>
                                    <option selected disabled> --Select --</option>
                                    <option value="ENERO">ENERO</option>
                                    <option value="FEBRERO">FEBRERO</option>
                                    <option value="MARZO">MARZO</option>
                                    <option value="ABRIL">ABRIL</option>
                                    <option value="MAYO">MAYO</option>
                                    <option value="JUNIO">JUNIO</option>
                                    <option value="JULIO">JULIO</option>
                                    <option value="AGOSTO">AGOSTO</option>
                                    <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                    <option value="OCTUBRE">OCTUBRE</option>
                                    <option value="NOVIMBRE">NOVIMBRE</option>
                                    <option value="DICIEMBRE">DICIEMBRE</option>
                                  </select>
                                @error('mes')
                                    <span>{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>AÑO:</label>

                                <select class="select form-control @error('ano') is-invalid @enderror"  wire:model.ignore="ano" required>
                                    <option selected disabled> --Select --</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>

                                  </select>
                                @error('ano')
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
