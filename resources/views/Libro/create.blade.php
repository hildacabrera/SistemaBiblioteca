@extends('layouts.base')
@section('content')
    <form action="/Libro" method="POST">
        @csrf
        <div class="container mt-3">
            <h5>Crear Libro</h5>

            <div class="mb-3">
                <label for="titulo">titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" maxlength="255" required="required">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" maxlength="255" required="required">
                <label for="paginas">Paginas:</label>
                <input type="number" class="form-control" id="paginas" name="paginas" required="required">
                <label for="localizacion">Localizacion:</label>
                <input type="text" class="form-control" id="localizacion" name="localizacion" maxlength="255" required="required">
                <label for="autor_id">Autor:</label>
                <select class="form-control" id="autor_id" name="autor_id">
                    @foreach ($autor as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                    @endforeach
                </select>
                <label for="editorial_id">
                    <h5>Editorial:</h5>
                </label>
                <select class="form-control" id="editorial_id" name="editorial_id">
                    @foreach ($editorial as $editorial)
                        <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <a class="btn btn-primary" href="/Libro">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
