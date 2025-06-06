{{-- Codigo que en caso de que no existan variables de sesión para acceder al usuario dirija al metodo logout para destruir variables de sesion, tokens y redirija al login de acceso para su autentificación --}}
@php
    use Illuminate\Support\Facades\Auth;
@endphp

@if (!Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script>
        document.getElementById('logout-form').submit();
    </script>
    @php exit; @endphp
@endif

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fuentes de Google Fuente: Source Sans Pro -->
  <!-- Font Awesome CDN -->
  {{-- <link rel="stylesheet" href="../lock/css/font-awesome.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-SzlrxWriC3nMJ0l4M+1+XKf1SJf5K9F4CmMjA1WqjzX7iwx9bKnEm8sOD5ktx+xGh9p5Yfj5M0+d8mWupxfN9A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
  {{-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> --}}
  {{-- <link href="../lock/css/font-awesome.css" rel="stylesheet"> --}}

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-SzlrxWriC3nMJ0l4M+1+XKf1SJf5K9F4CmMjA1WqjzX7iwx9bKnEm8sOD5ktx+xGh9p5Yfj5M0+d8mWupxfN9A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link href="../dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">


   
  <!-- Estilo del tema -->
  {{-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0"> --}}
  <link href="../lock/css/estilos-lock.css" rel="stylesheet">

  {{-- <style>
    .btn i {
      color: #000 !important;
      font-size: 1.2rem;
    }
  </style> --}}


  
</head>
<body class="hold-transition lockscreen">
<!-- Centrado automatico de los elementos  -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    
      {{ config('app.name') }}

  </div>



  <div class="lockscreen-logo">
    <img src="img/escudo-gris.png" id="icon" alt="Escudo Tribunal superior de Justicia del Estado de Tlaxcala">
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Usuario en Sessión: {{ auth()->user()->name }}</div>

  <!-- INICIA ITEM - LOCK SCREEN -->
  <div class="lockscreen-item">
    <!-- imagen lockscreen -->
    <div class="lockscreen-image">
      <img src="../img/user-profile.png" width="50" height="50" alt="Imagen de usuario">
    </div>
    <!-- /.imagen lockscreen -->

    <!-- Credenciales del lockscreen (contenido en el formulario) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fa fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.credenciales del lockscreen -->

  </div>
  <!-- /.item del lockscreen -->
  <div class="help-block text-center">
    Introduzca su password para recuperar su sesión
  </div>
  <div class="text-center">
    {{-- <a href="/logout">O inicialice sesión con un usuario diferente</a> --}}
    <form action="/logout " method="POST">
                      @csrf
                      <a class="dropdown"  href="#" onclick="this.closest('form').submit()">
                        O inicialice sesión con un usuario diferente
                      </a>
                      
                    </form>
  </div>
  <div class="lockscreen-footer text-center">
    {{ config('app.name') }} | {{ date('Y') }} <br>
    
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../lock/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../lock/js/bootstrap.bundle.min.js"></script>

</body>
</html>
