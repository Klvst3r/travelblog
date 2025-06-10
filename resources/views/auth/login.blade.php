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

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          
          
          <!-- Login_content -->
          <section class="login_content">
            

               

                <div class="fadeIn first">
                    <img src="img/escudo-gris.png" id="icon" alt="Escudo Tribunal superior de Justicia del Estado de Tlaxcala">
                  </div>
                  <h2>Tribunal Superior de Justicia de Tlaxcala</h2>
                  <h2>{{ config('app.name') }}</h2>
                  <p>&nbsp;</p>
            
            <form method="POST" action="{{ route('login') }}" id="login-form" style="{{ session('status') ? 'display:none;' : '' }}">
                            @csrf                  
                  

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

             

                <div class="item form-group">
      
                      <input type="submit" value="Ingresar" class="btn btn-pill text-white btn-block btn-primary">
                    
                </div>

              </form>
          
               {{-- ALERTA DE SESIÓN --}}
               @if(session('status'))
                    <div id="logout-alert" class="alert text-center" role="alert"
                        style="
                            background-color: #d1e7dd;
                            color: #0f5132;
                            border: 1px solid #0f5132;
                            border-radius: 8px;
                            padding: 10px 15px;
                            margin-top: 20px;
                            box-shadow: 0 0 10px rgba(15, 81, 50, 0.1);
                        ">
                        <i class="fa fa-check-circle" style="margin-right: 8px;"></i>
                        {{ session('status') }}
                    </div>
                @endif


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
          </section>
          <!-- /Login_content -->


        
        </div>

      </div>
    </div>

    <!-- Cierre despues de 5 segundos -->
   @if(session('status'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const alertBox = document.getElementById('logout-alert');
            const loginForm = document.getElementById('login-form');

            if (loginForm) {
                loginForm.style.display = 'none'; // Ocultar login mientras se muestra la alerta
            }

            // Después de 3 segundos
            setTimeout(() => {
                if (alertBox) {
                    alertBox.style.transition = 'opacity 1s ease';
                    alertBox.style.opacity = '0';

                    // Luego de 1 segundo extra, quitar la alerta y mostrar el login
                    setTimeout(() => {
                        alertBox.remove();
                        if (loginForm) {
                            loginForm.style.display = 'block';
                        }
                    }, 1000);
                }
            }, 3000);
        });
    </script>
    @endif






  </body>
</html>
