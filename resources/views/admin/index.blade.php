@extends('layout.index')
@section('titulo', 'Posts')
@section('subtitulo', 'Todos los Posts - Todos')

@section('content')
    <h2>Usuario Autenticado: {{ auth()->user()->name }}</h2>
    <h2>Email: {{ auth()->user()->email }}</h2>

    {{-- Datatables de ejemplo --}}
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

            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $articulo->clave }}</td>
                    <td>{{ $articulo->descripcion }}</td>
                    <td class="text-center">
                        <i class="fa fa-pencil text-info" title="Editar"
                            style="cursor:pointer; font-size:20px; margin: 0 5px;"></i>
                        <i class="fa fa-trash text-danger" title="Eliminar"
                            style="cursor:pointer; font-size:20px; margin: 0 5px;"></i>
                    </td>
                </tr>
            @endforeach
        </x-tabla-indice>

    @endsection
