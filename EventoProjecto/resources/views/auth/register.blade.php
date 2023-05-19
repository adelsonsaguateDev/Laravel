<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="\css\estilo\plugins\fontawesome-free\css\all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="\css\estilo\plugins\icheck-bootstrap\icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="\css\estilo\dist\css\adminlte.min.css">
</head>

<body class="hold-transition register-page">
<div class="register-box">


 
  <div class="card">
  <div class="card-body register-card-body">
    <img style="width: 180px; margin: 55px; margin-left: 75px; " src="/img/logo_eventos.svg" alt="logo_evento_do_dia">
        
        <!-- Erros ao fazer login-->
        
        <div style="color: red; ">
            <x-jet-validation-errors class="mb-4" />
        
        </div>
        
         @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
       @endif


       

       <form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="input-group mb-3">
          <input id="name" type="text" name="name"  :value="old('name')" required autofocus autocomplete="name"  class="form-control" placeholder="Nome completo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email"  name="email" :value="old('email')" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" required autocomplete="new-password" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar senha" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms"  required>
              <label for="agreeTerms">
                
               Aceitar os termos
               @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
               {!! __('I agree to the :terms_of_service and :privacy_policy', [
                               'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                               'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                       ]) !!}
 
               @endif
               

           </label>
        </div>
      </div>
   

              
            
          
          <!-- /.col -->
          <div class="col-4">
            <button style="background-color: #F2A349; color:cornsilk;" type="submit" class="btn btn-block">Registar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
      <p class="mb-5" style="margin-top: 20px; ">
        Tens conta?    <a href="\login" class="text-center">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
</html>
