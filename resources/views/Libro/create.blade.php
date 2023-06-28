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
    <form action="/Libro" method="POST">
        @csrf
        <div class="container mt-3">
            <h5>Crear Libro</h5>
            <div class="mb-3">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn">
                <label for="paginas">Paginas:</label>
                <input type="number" class="form-control" id="paginas" name="paginas">
                <label for="localizacion">Localizacion:</label>
                <input type="text" class="form-control" id="localizacion" name="localizacion">
                <label for="autor_id">Autor:</label>
                <select class="form-control" id="autor_id" name="autor_id">
                    @foreach ($autor as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                    @endforeach
                </select>
                <label for="editorial_id">Editorial:</label>
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
