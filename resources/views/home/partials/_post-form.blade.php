{{-- Partial del formulario de Post --}}

{{-- Campo: Título --}}
<div class="item form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Título <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input type="text" name="title" class="form-control"
               value="{{ old('title', isset($post) ? $post->title : '') }}" required>
        @if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
        @endif
    </div>
</div>

{{-- Campo: Extracto --}}
<div class="item form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Extracto</label>
    <div class="col-md-6 col-sm-6">
        <textarea name="excerpt" class="form-control" rows="3" required>{{ old('excerpt', isset($post) ? $post->excerpt : '') }}</textarea>
        @if ($errors->has('excerpt'))
            <span class="text-danger">{{ $errors->first('excerpt') }}</span>
        @endif
    </div>
</div>

{{-- Campo: Contenido --}}
<div class="item form-group {{ $errors->has('body') ? 'has-error' : '' }}">
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

        {{-- Área editable --}}
        <div id="editor" class="editor-wrapper placeholderText" contenteditable="true"
             style="border:1px solid #ccc; padding:10px; min-height:150px;">
            {{ old('body', isset($post) ? $post->body : '') }}
        </div>

        {{-- Textarea oculta para enviar el contenido --}}
        <textarea name="body" id="descr" style="display:none;"></textarea>
        @if ($errors->has('body'))
            <span class="text-danger">{{ $errors->first('body') }}</span>
        @endif
    </div>
</div>

{{-- Campo: Categoría --}}
<div class="item form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Categoría <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <select name="category_id" class="form-control" required>
            <option value="">-- Selecciona una categoría --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', isset($post) ? $post->category_id : '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <span class="text-danger">{{ $errors->first('category_id') }}</span>
        @endif
    </div>
</div>

{{-- Campo: Etiquetas --}}
<div class="item form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Etiquetas</label>
    <div class="col-md-6 col-sm-6">
        <select id="tags" name="tags[]" class="form-control select2" multiple required
                data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}"
                    {{ (collect(old('tags', isset($post) ? $post->tags->pluck('id')->toArray() : []))->contains($tag->id)) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('tags'))
            <span class="text-danger">{{ $errors->first('tags') }}</span>
        @endif
    </div>
</div>

{{-- Campo: Fecha de publicación --}}
<div class="item form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Publicación</label>
    <div class="col-md-6 col-sm-6">
        <input name="published_at" type="date" class="form-control"
               value="{{ old('published_at', isset($post) ? optional($post->published_at)->format('Y-m-d') : '') }}" >
    </div>
</div>
