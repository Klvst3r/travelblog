@extends('layout.index')

@section('ruta_titulo', route('home.index'))
@section('titulo', 'Posts')
@section('subtitulo', 'Editar Post')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" />
    <style>
        /* Estilos personalizados para Dropzone */
        .dropzone {
            border: 2px dashed #0087F7 !important;
            border-radius: 10px !important;
            background: #f8f9fa !important;
            min-height: 200px !important;
            padding: 20px !important;
            text-align: center !important;
        }

        .dropzone:hover {
            border-color: #0056b3 !important;
            background: #e9ecef !important;
        }

        .dropzone .dz-message {
            margin: 2em 0 !important;
            color: #6c757d !important;
            font-weight: 500 !important;
        }

        /* Estilos para los previews */
        .dropzone .dz-preview {
            position: relative !important;
            display: inline-block !important;
            margin: 10px !important;
            min-height: 0 !important;
            width: 150px !important;
            background: white !important;
            border: 1px solid #dee2e6 !important;
            border-radius: 8px !important;
            padding: 10px !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
        }

        .dropzone .dz-preview .dz-image {
            position: relative !important;
            width: 100% !important;
            height: 120px !important;
            overflow: hidden !important;
            border-radius: 6px !important;
        }

        .dropzone .dz-preview .dz-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        .dropzone .dz-preview .dz-details {
            padding: 8px 0 4px 0 !important;
        }

        .dropzone .dz-preview .dz-filename {
            font-size: 12px !important;
            color: #495057 !important;
            word-break: break-all !important;
        }

        .dropzone .dz-preview .dz-size {
            font-size: 11px !important;
            color: #6c757d !important;
            margin-bottom: 4px !important;
        }

        .dropzone .dz-preview .dz-progress {
            position: absolute !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 80% !important;
            height: 6px !important;
            background: rgba(255, 255, 255, 0.9) !important;
            border-radius: 3px !important;
            overflow: hidden !important;
        }

        .dropzone .dz-preview .dz-upload {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            height: 100% !important;
            background: #28a745 !important;
            transition: width 0.3s ease !important;
        }

        .dropzone .dz-preview .dz-success-mark,
        .dropzone .dz-preview .dz-error-mark {
            position: absolute !important;
            top: -8px !important;
            right: -8px !important;
            width: 24px !important;
            height: 24px !important;
            border-radius: 50% !important;
            background: white !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) !important;
            z-index: 10 !important;
        }

        .dropzone .dz-preview .dz-success-mark i {
            color: #28a745 !important;
            font-size: 14px !important;
        }

        .dropzone .dz-preview .dz-error-mark i {
            color: #dc3545 !important;
            font-size: 14px !important;
        }

        .dropzone .dz-preview .dz-remove {
            position: absolute !important;
            bottom: -12px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            background: #dc3545 !important;
            color: white !important;
            border: none !important;
            border-radius: 15px !important;
            padding: 4px 8px !important;
            font-size: 11px !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }

        .dropzone .dz-preview .dz-remove:hover {
            background: #c82333 !important;
            transform: translateX(-50%) scale(1.05) !important;
        }

        .dropzone .dz-preview .dz-error-message {
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            right: 0 !important;
            background: #dc3545 !important;
            color: white !important;
            padding: 4px 8px !important;
            border-radius: 4px !important;
            font-size: 11px !important;
            margin-top: 4px !important;
            z-index: 20 !important;
        }
    </style>
@endpush

@section('content')

    <x-form-panel :mode="'edit'" titulo="Editar Post" subtitulo="Modifica los datos necesarios" formId="form-post"
        action="{{ route('home.update', $post->id) }}" method="POST">

        @csrf
        @method('PUT')

        @include('home.partials._post-form', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ])

    </x-form-panel>

@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" />
@endpush


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-post');
            const editor = document.getElementById('editor');
            const textarea = document.getElementById('descr');
            form.addEventListener('submit', function() {
                textarea.value = editor.innerHTML;
            });
        });
        setTimeout(() => {
            $('.alert').alert('close');
        }, 4000);
    </script>



    <script>
        // IMPORTANTE: Desactivar auto-discovery ANTES de inicializar
        Dropzone.autoDiscover = false;

        // Inicializar cuando el documento esté listo
        document.addEventListener('DOMContentLoaded', function() {
            var myDropzone = new Dropzone('#my-dropzone', {
                url: '{{ route('home.photos.store', $post->id) }}',
                acceptedFiles: 'image/*',
                paramName: 'photo',
                maxFilesize: 2, // 2MB
                maxFiles: 10, // Límite de archivos
                addRemoveLinks: true,
                dictDefaultMessage: '<i class="fa fa-cloud-upload" style="font-size: 48px; color: #ccc;"></i><br>Arrastra imágenes aquí o haz clic para subir',
                dictRemoveFile: '<i class="fa fa-trash"></i>',
                dictCancelUpload: "Cancelar",
                dictCancelUploadConfirmation: "¿Estás seguro de cancelar la subida?",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

                // Template personalizado para preview
                previewTemplate: `
            <div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <img data-dz-thumbnail />
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
                <div class="dz-progress">
                    <span class="dz-upload" data-dz-uploadprogress></span>
                </div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                <div class="dz-success-mark">
                    <i class="fa fa-check-circle text-success"></i>
                </div>
                <div class="dz-error-mark">
                    <i class="fa fa-times-circle text-danger"></i>
                </div>
                <div class="dz-remove" data-dz-remove>
                    <i class="fa fa-trash text-danger"></i> Eliminar
                </div>
            </div>
        `,

                init: function() {
                    console.log('Dropzone inicializado correctamente');

                    // Personalizar el comportamiento
                    this.on("addedfile", function(file) {
                        // Ocultar marcas por defecto
                        const preview = file.previewElement;
                        preview.querySelector('.dz-success-mark').style.display = 'none';
                        preview.querySelector('.dz-error-mark').style.display = 'none';
                    });

                    this.on("thumbnail", function(file, dataUrl) {
                        // Ajustar el tamaño de la thumbnail
                        const img = file.previewElement.querySelector('img');
                        if (img) {
                            img.style.width = '100%';
                            img.style.height = '120px';
                            img.style.objectFit = 'cover';
                            img.style.borderRadius = '8px';
                        }
                    });
                }
            });

            // Evento de éxito
            myDropzone.on('success', function(file, response) {
                console.log('Archivo subido exitosamente:', response);

                // Mostrar marca de éxito
                const successMark = file.previewElement.querySelector('.dz-success-mark');
                if (successMark) {
                    successMark.style.display = 'block';
                    setTimeout(() => {
                        successMark.style.display = 'none';
                    }, 2000);
                }
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
                const errorMsg = file.previewElement.querySelector('.dz-error-message span');
                if (errorMsg) {
                    errorMsg.textContent = message;
                }

                // Mostrar marca de error
                const errorMark = file.previewElement.querySelector('.dz-error-mark');
                if (errorMark) {
                    errorMark.style.display = 'block';
                }
            });

            // Evento cuando se elimina un archivo
            myDropzone.on('removedfile', function(file) {
                console.log('Archivo eliminado');
            });
        });
    </script>
@endpush
