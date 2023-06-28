@extends('layouts.base')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="4">
                    <a class="btn btn-primary" href="/Ejemplar/create">Agregar ejemplar</a>
                </th>
            </tr>
            <tr>
                <th>Código</th>
                <th>Localización</th>
                <th>Cantidad</th>
                <th>Titulo libro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ejemplar as $ejemplar)
                <tr>
                    <td>{{ $ejemplar->id }}</td>
                    <td>{{ $ejemplar->localizacion }}</td>
                    <td>{{ $ejemplar->cantidad }}</td>
                    <td>{{ $ejemplar->libro_titulo }}</td>
                    <td><a class="btn btn-primary" href="/Ejemplar/{{ $ejemplar->id }}/edit"><small>Modificar</small></a>
                        <a class="btn btn-danger" href="/Ejemplar/{{ $ejemplar->id }}/delete"><small>Eliminar</small></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
