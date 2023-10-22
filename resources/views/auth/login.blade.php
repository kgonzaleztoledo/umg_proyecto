@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="account-content">

                 <!-- Plantilla de maquetacion
            <a href="" class="btn btn-primary apply-btn">Apply Job</a>
                    Link de Restauracion
              -->


            <div class="container">
              <!-- Logotipo de la cuenta -->
                <div class="account-logo">
                <!-- Account Logo    -->
                <a href="login"><img src=" {{ URL::to('assets/img/logo2.png') }}" alt="Sistema RRHH"></a>

                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
               <!-- /Logotipo de cuenta -->
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Login</h3>
                        <p class="account-subtitle">Sistema de Gestión de Nomina  </p>

                <!-- Formulario de cuenta -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Correo Electronico:</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ingrese Correo Electronico">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Password:</label>
                                    </div>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ingrese Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label></label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="{{ route('forget-password') }}">
                                            ¿Has olvidado tu contraseña?
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Entrar</button>
                            </div>
                                     <!-- /Fin de Formulario de cuenta este emben es link para registrar nuevo usuario
                            <div class="account-footer">
                                <p>¿Aún no tienes una cuenta? <a href="{{ route('register') }}">Registrar</a></p>
                            </div>
                            -->

                        </form>
                        <!-- /Fin de Formulario de cuenta -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
