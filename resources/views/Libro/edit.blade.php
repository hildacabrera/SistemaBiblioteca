@extends('layouts.base')
@section('content')
    <form action="/Libro/{{ $libro->id }}"method="POST">
        @csrf
        @method('put')
        <div class="container mt-3">
            <h5>Editar Libro</h5>

            <div class="mb-3">
                <label for="titulo">titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->titulo }}" maxlength="255" required="required">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $libro->isbn }}" required="required">
                <label for="paginas">Paginas:</label>
                <input type="text" class="form-control" id="paginas" name="paginas" value="{{ $libro->paginas }}" required="required">
                <label for="localizacion">Localizacion:</label>
                <input type="text" class="form-control" id="localizacion" name="localizacion" value="{{ $libro->localizacion }}" required="required">
                <label for="autor_id">Autor:</label>
                <select class="form-control" id="autor_id" name="autor_id">
                    @foreach ($autor as $autor)
                        @if ($autor->id == $libro->autor_id)
                            <option value="{{ $autor->id }}" selected>{{ $autor->nombre }}</option>
                        @else
                            <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="editorial_id">
                    <h5>Editorial:</h5>
                </label>
                <select class="form-control" id="editorial_id" name="editorial_id">
                    @foreach ($editorial as $editorial)
                        @if ($editorial->id == $libro->editorial_id)
                            <option value="{{ $editorial->id }}" selected>{{ $editorial->nombre }}</option>
                        @else
                            <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <br>
            <a class="btn btn-primary" href="/Libro">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
