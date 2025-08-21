<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $titulo ?? 'Formulario' }} <small>{{ $subtitulo ?? '' }}</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form 
            id="{{ $formId ?? 'form-principal' }}" 
            class="form-horizontal form-label-left parsley-form" 
            action="{{ $action ?? '#' }}" 
            method="{{ $method ?? 'POST' }}" 
            data-parsley-validate 
            {{-- novalidate --}}
        >
          @csrf
          {{ $slot }}

          <div class="ln_solid"></div>
          <div class="item form-group">
              <div class="col-12 text-center">
            {{-- <div class="col-md-6 col-sm-6 offset-md-3"> --}}
              {{-- <button class="btn btn-primary" type="button">Cancelar</button>
              <button class="btn btn-primary" type="reset">Limpiar</button> --}}
              {{-- <button type="submit" class="btn btn-success">Guardar</button> --}}
              <button type="submit" class="btn btn-success">
                {{ (isset($mode) && $mode === 'edit') ? 'Actualizar' : 'Guardar' }}
            </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
