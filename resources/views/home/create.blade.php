@extends('layout.index')

@section('ruta_titulo', route('home.index'))
@section('titulo', 'Posts')
@section('subtitulo', 'Crear un Post')

@section('content')

    <x-form-panel
        :mode="'create'" 
        titulo="Formulario de Post"
        subtitulo="Ingresa los datos del post"
        formId="form-post"
        action="{{ route('home.store') }}"
        method="POST">

        @include('home.partials._post-form', [
            'categories' => $categories,
            'tags' => $tags,
            // Para create, no hay $post, así que no lo pases
        ])

    </x-form-panel>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('form-post');
        const editor = document.getElementById('editor');
        const textarea = document.getElementById('descr');

        form.addEventListener('submit', function () {
            textarea.value = editor.innerHTML;
        });
    });

    // Cerrar alertas automáticamente
    setTimeout(() => {
        $('.alert').alert('close');
    }, 4000);
</script>

@endpush
