@extends('layouts.base')
@section('content')
    <form action="/Prestamo" method="POST">
        @csrf
        @if (isset($_REQUEST['error']) && $_REQUEST['error'] != '')
            <div class="alert alert-danger">{{ $_REQUEST['error'] }}</div>
        @endif
        <div class="container mt-3">
            <h5>Realizar prestamo</h5>
            <div class="mb-3">
                <label for="fecha_pres">Fecha prestamo:</label>
                <input type="date" class="form-control" style="width: auto" id="fecha_pres" name="fecha_pres" required="required">
                <label for="fecha_dev">Fecha devolucion:</label>
                <input type="date" class="form-control" style="width: auto" id="fecha_dev" name="fecha_dev" required="required">
                <label for="usuario_id">Usuario:</label>
                <select class="form-control" id="usuario_id" name="usuario_id">
                    @foreach ($usuario as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
                <label for="ejemplar_id">Ejemplar:</label>
                <select class="form-control" id="ejemplar_id" name="ejemplar_id">
                    @foreach ($ejemplar as $ejemplar)
                        <option value="{{ $ejemplar->id }}">{{ $ejemplar->localizacion }} - Libro:
                            {{ $ejemplar->libro_titulo }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <a class="btn btn-primary" href="/Prestamo">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
