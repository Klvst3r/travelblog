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


    <x-tabla-indice id="tabla-posts">
    <x-slot name="thead">
      <tr>
                <th>#</th>
                <th>Título</th>
                <th>Extracto</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
    </x-slot>

   @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->excerpt, 50) }}</td>
                <td>{{ $post->category->name ?? 'Sin categoría' }}</td>
                <td class="text-center">
                    <i class="fa fa-pencil text-info" title="Editar" style="cursor:pointer; font-size:20px; margin: 0 5px;"></i>
                    <i class="fa fa-trash text-danger" title="Eliminar" style="cursor:pointer; font-size:20px; margin: 0 5px;"></i>
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