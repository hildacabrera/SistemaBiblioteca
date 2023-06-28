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
    <form action="/Autor" method="POST">
        @csrf
        <div class="container mt-3">
            <h5>Crear Autor</h5>
            <div class="mb-3">
                <label for="nombre">Nombre Autor:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <br>
            <a class="btn btn-primary" href="/Autor">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
