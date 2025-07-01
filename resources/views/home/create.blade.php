@extends('layout.index')

@section('ruta_titulo', route('home')) 

@section('titulo', 'Posts')
@section('subtitulo', 'Crear un Post')

@section('content')

    <x-form-panel 
    titulo="Form" 
    subtitulo="Ingresa los datos del post" 
    formId="form-post" 
    action="{{ route('home.store') }}" 
    method="POST">

    {{-- Campo: Título --}}
   <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Título <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="title" class="form-control " required>

        </div>
    </div>

    {{-- Campo: Extracto --}}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Extracto</label>
        <div class="col-md-6 col-sm-6">
        <textarea name="excerpt" class="form-control" rows="3" required></textarea>
        </div>
    </div>

    {{-- Campo: Contenido --}}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Contenido</label>
        <div class="col-md-6 col-sm-6">
        <textarea name="body" class="form-control" rows="5" required></textarea>
        </div>
    </div>

    {{-- Campo: Fecha publicación --}}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Publicación</label>
        <div class="col-md-6 col-sm-6">
        <input name="published_at" type="date" class="form-control" required>
        </div>
    </div>

    </x-form-panel>




@endsection