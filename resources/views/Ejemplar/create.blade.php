@extends('layouts.base')
@section('content')
    @if ($errors != null && $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/Ejemplar" method="POST">
        @csrf
        <div class="container mt-3">
            <h5>Crear Ejemplar</h5>
            <div class="mb-3">
                <label for="localizacion">Localizacion:</label>
                <input type="text" class="form-control" id="localizacion" name="localizacion">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad">
                <label for="libro_id">Titulo Libro:</label>
                <select class="form-control" id="libro_id" name="libro_id">
                    @foreach ($libro as $libro)
                        <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <a class="btn btn-primary" href="/Ejemplar">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
