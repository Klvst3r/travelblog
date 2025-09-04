@extends('layout.index')

@section('ruta_titulo', route('home.index'))
@section('titulo', 'Posts')
@section('subtitulo', 'Detalles del Post')

@section('content')
    <x-form-panel
        :mode="'detail'"
        titulo="Detalles del Post"
        subtitulo="Consulta los datos del post"
        formId="form-post"
        action=""
        method="GET">

        @include('home.partials._post-form', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'readonly' => true
        ])

    </x-form-panel>
@endsection
