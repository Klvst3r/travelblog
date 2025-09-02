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

<script>
    new Dropzone('.dropzone', {
        url: '/home/posts/{{ $post->id }}/photos'
     });

     Dropzone.autoDiscover = false;
</script>

@endpush
