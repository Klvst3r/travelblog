<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $titulo ?? 'Formulario' }} <small>{{ $subtitulo ?? '' }}</small></h2>
        {{-- <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a class="dropdown-item" href="#">Settings 1</a></li>
              <li><a class="dropdown-item" href="#">Settings 2</a></li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a></li>
        </ul> --}}
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
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
