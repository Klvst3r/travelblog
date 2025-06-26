@extends('layout.index')

{{-- @section('titulo', 'Catálogo de Marcas')
@section('subtitulo', 'Listado completo') --}}

{{-- Pase de valores al layout base mediante variables de php
@php
    $titulo = 'Catálogo de Marcas';
    $subtitulo = 'Listado completo';
@endphp --}}

{{-- Lo cambiamos por section titulo y subtitulo --}}
@section('titulo')
    Dashboard
@endsection

@section('subtitulo')
 Sesión de usuario
@endsection

@section('content')

    <p>Mostrar todos los posts.</p>

@endsection