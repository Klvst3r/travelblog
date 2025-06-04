@extends('admin.layout')

@section('content')
<h1>Dashboard</h1>

<h2>Usuario Autenticado: {{ auth()->user()->name }}</h2>
<h2>Email: {{ auth()->user()->email }}</h2>
@stop