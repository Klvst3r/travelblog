@extends('layout.index')

@section('ruta_titulo', route('home.index'))
@section('titulo', 'Posts')
@section('subtitulo', 'Editar Post')

@section('content')

    <x-form-panel
        :mode="'edit'"
        titulo="Editar Post"
        subtitulo="Modifica los datos necesarios"
        formId="form-post"
        action="{{ route('home.update', $post->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('home.partials._post-form', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ])

    </x-form-panel>

@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" />
@endpush


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('form-post');
        const editor = document.getElementById('editor');
        const textarea = document.getElementById('descr');
        form.addEventListener('submit', function () {
            textarea.value = editor.innerHTML;
        });
    });
    setTimeout(() => {
        $('.alert').alert('close');
    }, 4000);
</script>

<!-- HTML del formulario -->
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Imágenes <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <div id="my-dropzone" class="dropzone">
            <div class="dz-message" data-dz-message>
                <span class="dz-text">Arrastra y suelta imágenes aquí o haz clic para subir</span>
                <span class="dz-subtitle">(Solo archivos de imagen)</span>
            </div>
        </div>
    </div>
</div>

<script>
    // IMPORTANTE: Desactivar auto-discovery ANTES de inicializar
    Dropzone.autoDiscover = false;

    // Inicializar cuando el documento esté listo
    document.addEventListener('DOMContentLoaded', function() {
        var myDropzone = new Dropzone('#my-dropzone', {
            url: '{{ route("home.photos.store", $post->id) }}',
            acceptedFiles: 'image/*',
            paramName: 'photo',
            maxFilesize: 2, // 2MB
            maxFiles: 10, // Límite de archivos
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra archivos aquí o haz clic para subir",
            dictRemoveFile: "Eliminar",
            dictCancelUpload: "Cancelar",
            dictCancelUploadConfirmation: "¿Estás seguro de cancelar la subida?",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            init: function() {
                console.log('Dropzone inicializado correctamente');
            }
        });

        // Evento de éxito
        myDropzone.on('success', function(file, response) {
            console.log('Archivo subido exitosamente:', response);
        });

        // Evento de error - CORREGIDO
        myDropzone.on('error', function(file, response) {
            console.log('Error en subida:', response);
            
            let message = 'Ha ocurrido un error al subir la imagen';
            
            // Verificar si es un string (error de Dropzone)
            if (typeof response === 'string') {
                message = response;
            } 
            // Verificar si es un objeto con errores de validación de Laravel
            else if (response && response.errors && response.errors.photo) {
                message = response.errors.photo[0];
            }
            // Verificar formato alternativo de error
            else if (response && response.photo) {
                message = response.photo[0];
            }
            
            // Mostrar error en el elemento de Dropzone
            file.previewElement.querySelector('.dz-error-message span').textContent = message;
            
            // Opcional: mostrar alerta
            // alert(message);
        });

        // Evento cuando se elimina un archivo
        myDropzone.on('removedfile', function(file) {
            console.log('Archivo eliminado');
        });
    });
</script>

@endpush
