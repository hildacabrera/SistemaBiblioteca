@extends('layouts.base')
@section('content')
    <form action="/Editorial/{{ $editorial->id }}"method="POST">
        @csrf
        @method('put')
        <div class="container mt-3">
            <h5>Editar Editorial</h5>
            <div class="mb-3">
                <label for="nombre">Nombre Editorial:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $editorial->nombre }}" maxlength="50" required="required">
            </div>
            <br>
            <a class="btn btn-primary" href="/Editorial">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
