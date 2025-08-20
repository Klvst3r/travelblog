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

<h2>Usuario Autenticado: {{ auth()->user()->name }}</h2>
<h2>Email: {{ auth()->user()->email }}</h2>
<p><br/></p>

    <p>Este es el contenido del catálogo principal.</p>
    <ul>
        <li>Elemento 1</li>
        <li>Elemento 2</li>
    </ul>
@endsection