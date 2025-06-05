<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fuentes de Google Fuente: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  

  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> --}}
  <link href="../lock/css/font-awesome.css" rel="stylesheet">
  
  <!-- Estilo del tema -->
  {{-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0"> --}}
  <link href="../lock/css/estilos-lock.css" rel="stylesheet">
  
</head>
<body class="hold-transition lockscreen">
<!-- Centrado automatico de los elementos  -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">

      {{ config('app.name') }}

  </div>
  <!-- User name -->
  <div class="lockscreen-name">Usuario en Sessión: {{ auth()->user()->name }}</div>

  <!-- INICIA ITEM - LOCK SCREEN -->
  <div class="lockscreen-item">
    <!-- imagen lockscreen -->
    <div class="lockscreen-image">
      <img src="../img/user-profile.png" width="50" height="50" alt="User Image">
    </div>
    <!-- /.imagen lockscreen -->

    <!-- Credenciales del lockscreen (contenido en el formulario) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password">

        <div class="input-group-append">
          <button type="button" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
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
    <a href="login.html">O inicialice sesión con un usuario diferente</a>
  </div>
  <div class="lockscreen-footer text-center">
    {{ config('app.name') }} | {{ date('Y') }} <br>
    
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"94b136123f303467","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.5.0","token":"2437d112162f4ec4b63c3ca0eb38fb20"}' crossorigin="anonymous"></script>
</body>
</html>
