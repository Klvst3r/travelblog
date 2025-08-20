@extends('layout.index')

{{-- @section('titulo', 'Catálogo de Marcas')
@section('subtitulo', 'Listado completo') --}}

{{-- Pase de valores al layout base mediante variables de php
@php
    $titulo = 'Catálogo de Marcas';
    $subtitulo = 'Listado completo';
@endphp --}}

{{-- Lo cambiamos por section titulo y subtitulo --}}
{{-- @section('titulo')
    Posts
@endsection

@section('subtitulo')
    Todas las publicaciones
@endsection --}}
@section('titulo', 'Posts')
@section('subtitulo', 'Todos los Posts')

@section('content')

<div class="d-flex justify-content-between flex-wrap mb-3">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Éxito!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

     {{-- 🔍 Depuración: Verifica si Laravel genera bien la ruta --}}
    {{-- @dd(route('home.create')) --}}


    {{-- 1. Modificamos el componente para enviar la url del boton agregar --}}
    {{-- <x-tabla-indice id="tabla-posts">  --}}
    {{-- <x-tabla-indice id="tabla-posts" create-url="https://google.com"> --}}
         <x-tabla-indice id="tabla-posts" :createurl="route('home.create')">

    {{-- <x-tabla-indice id="tabla-posts" create-url="{{ route('home.create') }}"> --}}
    <x-slot name="thead">
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Extracto</th>
            <th>Categoría</th>
            <th>Publicado</th>
            <th>Acciones</th>
        </tr>
    </x-slot>

    @foreach($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ Str::limit($post->excerpt, 50) }}</td>
            <td>{{ $post->category->name ?? 'Sin categoría' }}</td>
            <td>{{ $post->published_at }}</td>
            {{-- <td class="text-center">
                <i class="fa fa-pencil text-info" title="Editar"></i>
                <i class="fa fa-trash text-danger" title="Eliminar"></i>
            </td> --}}
            <td class="text-center">
            <a href="{{ route('home.edit', $post->id) }}">
                <i class="fa fa-pencil text-info" title="Editar"></i>
            </a>
            {{-- <form action="{{ route('home.destroy', $post->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button style="border:none;background:none;cursor:pointer;" onclick="return confirm('¿Seguro de eliminar?')">
                    <i class="fa fa-trash text-danger" title="Eliminar"></i>
                </button>
            </form> --}}
        </td>
        </tr>
    @endforeach
</x-tabla-indice>




@endsection


@push('scripts')
    <script>
    setTimeout(() => {
        $('.alert').alert('close');
    }, 4000); // 4 segundos
    </script>
@endpush
