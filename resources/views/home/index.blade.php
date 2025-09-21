@extends('layout.index')

@section('titulo', 'Posts')
@section('subtitulo', 'Todos los Posts cuando esta autenticado')

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

        <x-tabla-indice id="tabla-posts" :createurl="route('home.create')">


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

            @foreach ($posts as $post)
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
                        <a href="{{ route('home.show', $post->id) }}" class="btn btn-xs btn-info">
                            <i class="fa fa-eye" title="Detalles"></i>
                        </a>
                        <a href="{{ route('home.edit', $post->id) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil" title="Editar"></i>
                        </a>
                        <a href="{{ route('home.edit', $post->id) }}" class="btn btn-xs btn-danger"
                            onclick="return confirm('¿Está seguro de eliminar este registro?')">
                            <i class="fa fa-times" title="Eliminar"></i>
                        </a>
                    </td>
                    {{-- <form action="{{ route('home.destroy', $post->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button style="border:none;background:none;cursor:pointer;" onclick="return confirm('¿Seguro de eliminar?')">
                    <i class="fa fa-trash text-danger" title="Eliminar"></i>
                </button>
            </form> --}}

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
