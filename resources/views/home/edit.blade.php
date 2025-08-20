@extends('layout.index')

@section('ruta_titulo', route('home.index'))
@section('titulo', 'Posts')
@section('subtitulo', 'Editar Post')

@section('content')

    <x-form-panel
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
    setTimeout(() => {
        $('.alert').alert('close');
    }, 4000);
</script>
@endpush
