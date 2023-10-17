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
                        <a href="{{ route('form/rol_usuario/page') }}">
                            <h3 class="page-title">Categoria Rol Usuarios</h3>
                        </a>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">CRUD ROL USUARIOS</li>
                        </ul>
                    </div>

                </div>
            </div>



            @livewire('vista-rol-usuario')





        </div>
    </div>
@endsection


@section('script')
    <script>
        Livewire.on('alert-add', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Dato Registrado Éxitoso',
                showConfirmButton: false,
                timer: 2400
            }).then(function(result) {
                if (true) {
                    window.location = '{{ url('form/rol_usuario/page') }}';
                }
            })

        })

        Livewire.on('alert-update', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Dato Actualizado Correctamente ',
                showConfirmButton: false,
                timer: 2400
            }).then(function(result) {
                if (true) {
                    window.location = '{{ url('form/rol_usuario/page') }}';
                }
            })

        })

        Livewire.on('alert-error', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'El nombre del Registro lo esta duplicando',
                showConfirmButton: false,
                timer: 2400
            })

        })
    </script>
@endsection
