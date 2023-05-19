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

<body class="hold-transition login-page">
<div class="login-box">


 
  <div class="card">
    <div class="card-body forgot-card-body">
        <img style="width: 180px; margin: 55px; margin-left: 75px; " src="/img/logo_eventos.svg" alt="logo_evento_do_dia">
        
        <!-- Erros ao fazer a recuperação-->
        
        <div style="color: red; ">
            <x-jet-validation-errors class="mb-4" />
        
        </div>
     <!--   
         @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
       @endif
    -->
       <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu a senha? Sem problema. Apenas envie o seu email e mandaremos o link de redefinição da senha no seu email.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-group mb-3">
          <input  type="email" class="form-control"  id="email"  name="email" :value="old('email')" placeholder="Email" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-4">
          <button style="background-color: #F2A349; color:cornsilk;" type="submit" class="btn btn-block">Enviar</button>
        </div>
      </div>
        
      </form>


      <p class="mb-1">
        <a href="\login" class="text-center">Login</a>
      </p>
    </div>
    <!-- /.forgotpassword-card-body -->
  </div>
</div>
<!-- /.forgotpassword-box -->

</body>
</html>
