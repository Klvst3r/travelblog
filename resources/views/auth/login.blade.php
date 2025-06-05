<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/dashboard/images/logo-TSJT.png" type="image/ico" />

    <title> {{ config('app.name') }} | Poder Judicial de Tlaxcala</title>
    {{-- <title>{{ config('app.name') }} </title> --}}

    <!-- Bootstrap -->
    {{-- <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Font Awesome -->
    {{-- <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"> --}}
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    {{-- Estilo inicial para evitar el FOUC (Flash of Unstyled Content) --}}
    <style>
      body { visibility: hidden; }
    </style>
    <script>
      window.addEventListener('load', function() {
        document.body.style.visibility = 'visible';
      });
    </script>

    
    <!-- Estilos -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../dashboard/build/css/bootstrap.min.css">
    
    <!-- Estilo pertsonalizado del Tema -->
    <link href="../dashboard/build/css/custom.css" rel="stylesheet">

    <!-- Segundo Estilo -->
    <link rel="stylesheet" href="../dashboard/build/css/style_002.css">

        <!-- Estilos del Login -->
    <link rel="stylesheet" href="../dashboard/build/css/style.css">

 
   
  <meta name="robots" content="noindex, follow">
</head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf

               

                <div class="fadeIn first">
                    <img src="img/escudo-gris.png" id="icon" alt="User Icon">
                  </div>
                  <h2>Tribunal Superior de Justicia de Tlaxcala</h2>
                  <h2>{{ config('app.name') }}</h2>
                  <p>&nbsp;</p>
                   
                  @if(session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif

                  <div class="item form-group">
                    <label for="email" class="col-form-label col-md-5 col-sm-5 ">{{ __('Usuario') }}</label>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} has-feedback">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electronico">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   </div>
                </div>


                <div class="item form-group {{ $errors->has('password') ? 'has-error' : '' }} has-feedback">
                    <label for="password" class="col-form-label col-md-5 col-sm-5 ">{{ __('Contraseña') }}</label>

                    <div class="">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                  
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>
              

                <div class="item form-group">
                  {{-- <div class="container-login100-form-btn m-t-17"> --}}
                      {{-- <button type="submit" class="btn btn-pill text-white btn-block btn-primary">
                          {{ __('Login') }}
                      </button> --}}
                      <input type="submit" value="Ingresar" class="btn btn-pill text-white btn-block btn-primary">

                    {{-- </div> --}}
                </div>

          

                <div class="clearfix"></div>

                <div class="separator">
              

                <div class="clearfix"></div>
                <br />

                <div>
              
                  <div class="text-end">
                    Bienes - {{ date('Y') }}
                  </div>
                </div>
              </div>
            </form>
          </section>


        
        </div>

      </div>
    </div>

    @if(session('status'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast align-items-center text-white bg-success border-0 show" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('status') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    const toastElList = [].slice.call(document.querySelectorAll('.toast'))
    toastElList.map(function (toastEl) {
        new bootstrap.Toast(toastEl).show()
    });
</script>
@endif
  </body>
</html>
