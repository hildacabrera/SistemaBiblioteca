@extends('layouts.base')
@section('content')
    <form action="/Ejemplar/{{ $ejemplar->id }}"method="POST">
        @csrf
        @method('put')
        <div class="container mt-3">
            <h5>Editar Ejemplar</h5>

            <div class="mb-3">
                <label for="localizacion">Localizacion:</label>
                <input type="text" class="form-control" id="localizacion" name="localizacion"value="{{ $ejemplar->localizacion }}" maxlength="50" required="required">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad"value="{{ $ejemplar->cantidad }}" required="required">
                <label for="libro_id">Titulo Libro:</label>
                <select class="form-control" id="libro_id" name="libro_id">
                    @foreach ($libro as $libro)
                        @if ($libro->id == $ejemplar->libro_id)
                            <option value="{{ $libro->id }}" selected>{{ $libro->titulo }}</option>
                        @else
                            <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <a class="btn btn-primary" href="/Ejemplar">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
