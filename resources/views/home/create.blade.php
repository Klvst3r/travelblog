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
    {{-- Campo: Contenido (con editor enriquecido) --}}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Contenido</label>
        <div class="col-md-6 col-sm-6">
            {{-- Toolbar --}}
            <div class="btn-toolbar editor mb-2" data-role="editor-toolbar" data-target="#editor-one">
                <div class="btn-group">
                    <a class="btn" data-edit="bold"><i class="fa fa-bold"></i></a>
                    <a class="btn" data-edit="italic"><i class="fa fa-italic"></i></a>
                    <a class="btn" data-edit="underline"><i class="fa fa-underline"></i></a>
                </div>
                <div class="btn-group">
                    <a class="btn" data-edit="insertunorderedlist"><i class="fa fa-list-ul"></i></a>
                    <a class="btn" data-edit="insertorderedlist"><i class="fa fa-list-ol"></i></a>
                </div>
                <div class="btn-group">
                    <a class="btn" data-edit="justifyleft"><i class="fa fa-align-left"></i></a>
                    <a class="btn" data-edit="justifycenter"><i class="fa fa-align-center"></i></a>
                    <a class="btn" data-edit="justifyright"><i class="fa fa-align-right"></i></a>
                </div>
            </div>

            {{-- Área editable con contenido --}}
            <div id="editor" class="editor-wrapper placeholderText" contenteditable="true" style="border:1px solid #ccc; padding:10px; min-height:150px;"></div>

            {{-- Textarea oculto que se enviará al servidor --}}
            <textarea name="body" id="descr" style="display:none;" required data-parsley-required></textarea>
        </div>
    </div>



    {{-- Campo: Categoría --}}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Categoría <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select name="category_id" class="form-control" required>
                <option value="">-- Selecciona una categoría --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


  {{-- Campo: Etiquetas (Select2 múltiple) --}}
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Etiquetas</label>
    <div class="col-md-6 col-sm-6">
        <select id="tags" name="tags[]" class="form-control select2" multiple style="width: 100%;" required>
            <option value="1">Etiqueta 1</option>
                <option value="2">Etiqueta 2</option>
                <option value="3">Etiqueta 3</option>
                <option value="4">Etiqueta 4</option>
                <option value="5">Etiqueta 5</option>
            </select>
        <div id="tags-error" style="color: red; font-size: 0.875em; display: none;">Este campo es obligatorio.</div>
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