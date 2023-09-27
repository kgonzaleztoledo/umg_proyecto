<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique su dirección de correo electrónico</div>
                <div class="card-header">Verifique su dirección de correo electrónico</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                       </div>
                   @endif
                   <a href="{{ url('/reset-password/'.$token) }}"  class="btn btn-primary apply-btn">Haga clic aquí en este link para restablecer tu contraseña</a>
               </div>
           </div>
       </div>
   </div>
</div>
