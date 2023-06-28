@extends('layouts.base')
@section('content')
    <form action="/Usuario/{{ $usuario->id }}"method="POST">
        @csrf
        @method('put')
        <div class="container mt-3">
            <h5>Editar Usuario</h5>
            <div class="mb-3">
                <label for="nombre">Nombre Usuario:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required="required" maxlength="50">
                <label for="Telefono">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}" required="required">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $usuario->direccion }}" required="required" maxlength="20">
            </div>
            <br>
            <a class="btn btn-primary" href="/Usuario">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
