@extends('layouts.base')
@section('content')
    @if (isset($_REQUEST['error']) && $_REQUEST['error'] != '')
        <div class="alert alert-danger">{{ $_REQUEST['error'] }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="4">
                    <a class="btn btn-primary" href="/Libro/create">Agregar Libro</a>
                </th>
            </tr>
            <tr>
                <th>Código</th>
                <th>Titulo</th>
                <th>ISBN</th>
                <th>Paginas</th>
                <th>Localizacion</th>
                <th>Autor</th>
                <th>Editorial</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libro as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->isbn }}</td>
                    <td>{{ $libro->paginas }}</td>
                    <td>{{ $libro->localizacion }}</td>
                    <td>{{ $libro->nombre_autor }}</td>
                    <td>{{ $libro->nombre_editorial }}</td>
                    <td><a class="btn btn-primary" href="/Libro/{{ $libro->id }}/edit"><small>Modificar</small></a>
                        <a class="btn btn-danger" href="/Libro/{{ $libro->id }}/delete"><small>Eliminar</small></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
