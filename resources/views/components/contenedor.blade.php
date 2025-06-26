        <!-- ----------------- Contenido Central ----------------- -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row">
            </div>
            
            {{-- ----------------- --}}
            <div class="x_panel">
                <div class="x_title">
                    {{-- <h2>{{ $titulo ?? 'Título por defecto' }} - <small>{{ $subtitulo ?? '' }}</small></h2> --}}
                        <h2>{{ $titulo }} - <small>{{ $subtitulo }}</small></h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                    {{-- <div class="temperature"><b>Contenido Marcado: </b>Texto Contenido --}}
                    {{-- </div> --}}
                        <!-- Content -->
                        {{-- @yield('content') Omitimos para veitar diplicidad de contenido en su lugar utlizamos $slot--}}
                        {{-- @section('content') --}}
                                {{ $slot }}
                        <!-- /Content -->
                    </div>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
            {{-- ----------------- --}}
        </div>
        <!-- /top tiles -->
        <!-- ----------------- /Contenido Central ----------------- -->