@include('layout.partials.header')

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      @include('layout.partials.side_menu')  
      @include('layout.partials.top_navigation')

        {{-- <x-contenedor titulo="Titulo Principal" subtitulo="subtitulo secundario">
            <!-- Aquí va tu contenido, omitimos para evtar duplicidad de contenido -->
            {{-- @yield('content') --}} 
           
        {{-- </x-contenedor> --}}

        {{-- si utilizamos pase de variables con php utilizamos seccion siguiente --}}
         {{-- @php
          $titulo = $titulo ?? 'Título por defecto';
          $subtitulo = $subtitulo ?? 'Subtítulo por defecto';
        @endphp

         <x-contenedor :titulo="$titulo" :subtitulo="$subtitulo">
          @yield('content')
      </x-contenedor> --}}

      {{-- Renderizamos titulo y subtitulo por sections de blade --}}
       @php
          $titulo = trim(View::yieldContent('titulo', 'Título por defecto'));
          $subtitulo = trim(View::yieldContent('subtitulo', 'Subtítulo por defecto'));
      @endphp

     
      <x-contenedor :titulo="$titulo" :subtitulo="$subtitulo">
         
        
        <nav aria-label="breadcrumb" class="mt-2 mb-3">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ View::yieldContent('titulo', 'Título por defecto') }}
            </li>
            @hasSection('subtitulo')
              <li class="breadcrumb-item active" aria-current="page">
                {{ View::yieldContent('subtitulo') }}
              </li>
            @endif
          </ol>
        </nav>


          @yield('content')
      </x-contenedor>

      @include('layout.partials.footer')