@extends('general.layout')

@section('header')
@endsection

@section ('menu')
@endsection


@section('content')
<div class="container">
  <h1>Catálogo: Marca</h1>
</div>

<!-- Formulario de búsqueda -->
<div class="form-row">
  <div class="col-lg-12 d-flex justify-content-center mb-3">

    <!-- Texto de  -->
    <div class="col-sm-6 ml-3">
      <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar marca o categoría">
    </div>

    <div style="margin-right: 10px">
      <button type="submit" class="btn btn-primary mr-2" style="margin-left: 7px"><span
          class="fa fa-search"></span> </button>
    </div>

    <a href="{{ url('/') }}" class="btn btn-secondary" style="margin-right: 5px">
      <span class="fa fa-eraser"></span>
    </a>

    <a href="{{ route('catalogos.marca.create') }}" class="btn btn-success" style="margin-left: 5px">
      <span class="fa fa-plus-square"></span> AGREGAR
    </a>
  </div>
</div>

<!-- Tabla de marcas -->
 <div id="tabla_filtro" class="tabla_filtro">
  <label></label>
 </div>
<div class="form-row justify-content-center mb-3">
  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:80%">
    <thead>
      <tr>
        <th>#</th>
        <th>Marca</th>
        <th>Categoría</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>1</td>
        <td>DELL</td>
        <td>Consumibles</td>
        <td>
          <button type="button" class="btn btn-warning btn-sm" title="Editar">
            <i class="fa fa-pencil-alt"></i>
          </button>
        </td>
      </tr>
      <tr>
        <td>Garrett Winters</td>
        <td>Accountant</td>
        <td>Tokyo</td>
        <td>63</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection