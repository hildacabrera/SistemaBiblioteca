@extends('layouts.base')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="4">
                    <a class="btn btn-primary" href="/Prestamo/create">Realizar prestamo</a>
                </th>
            </tr>
            <tr>
                <th>Código</th>
                <th>Fecha prestamo</th>
                <th>Fecha devolucion</th>
                <th>Usuario</th>
                <th>Ejemplares</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamo as $prestamo)
                <tr>
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->fecha_pres }}</td>
                    <td>{{ $prestamo->fecha_dev }}</td>
                    <td>{{ $prestamo->nombre_usuario }}</td>
                    <td>{{ $prestamo->localizacion_ejemplar }}</td>
                    <td><a class="btn btn-primary" href="/Prestamo/{{ $prestamo->id }}/edit"><small>Modificar</small></a>
                        <a class="btn btn-danger" href="/Prestamo/{{ $prestamo->id }}/delete"><small>Eliminar</small></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
