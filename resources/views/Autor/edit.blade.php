@extends('layouts.base')
@section('content')
    <form action="/Autor/{{ $autor->id }}"method="POST">
        @csrf
        @method('put')
        <div class="container mt-3">
            <h5>Editar Autor</h5>
            <div class="mb-3">
                <label for="nombre">Nombre Autor:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $autor->nombre }}" maxlength="50" required="required">
            </div>
            <br>
            <a class="btn btn-primary" href="/Autor">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
