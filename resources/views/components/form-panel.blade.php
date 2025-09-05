<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $titulo ?? 'Formulario' }} <small>{{ $subtitulo ?? '' }}</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        @if(isset($mode) && $mode === 'detail')
            {{-- Para solo visualización, no necesitamos enviar datos --}}
            <div class="mb-3">
                {{ $slot }}
            </div>

            <div class="item form-group">
              <div class="col-12 text-center">
                <a href="{{ route('home.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Regresar
                </a>
              </div>
            </div>
        @else
            {{-- Para create o edit --}}
            <form 
                id="{{ $formId ?? 'form-principal' }}" 
                class="form-horizontal form-label-left parsley-form" 
                action="{{ $action ?? '#' }}" 
                method="{{ $method ?? 'POST' }}" 
                data-parsley-validate
            >
              @csrf
              {{ $slot }}

              <div class="ln_solid"></div>
              <div class="item form-group">
                  <div class="col-12 text-center">
                      <button type="submit" class="btn btn-success">
                          {{ $mode === 'edit' ? 'Actualizar' : 'Guardar' }}
                      </button>
                  </div>
              </div>
            </form>
        @endif

      </div>
    </div>
  </div>
</div>
