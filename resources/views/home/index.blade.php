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
    <x-tabla-indice id="tabla-posts">
    <x-slot name="thead">
      <tr>
        <th>#</th>
        <th>Clave</th>
        <th>Descripción</th>
        <th>Acciones</th>
      </tr>
    </x-slot>

    @foreach($articulos as $articulo)
      <tr>
        <td>1</td>
        <td>{{ $articulo->clave }}</td>
        <td>{{ $articulo->descripcion }}</td>
        <td class="text-center">
            <i class="fa fa-pencil text-info" title="Editar" style="cursor:pointer; font-size:20px; margin: 0 5px;"></i>
            <i class="fa fa-trash text-danger" title="Eliminar" style="cursor:pointer; font-size:20px; margin: 0 5px;"></i>
        </td>
      </tr>
    @endforeach
  </x-tabla-indice>

@endsection