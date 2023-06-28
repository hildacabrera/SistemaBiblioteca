@extends('layouts.base')
@section('content')
    <p>¿Desea eliminar el libro: {{ $libro->titulo }}?</p>
    <br>
    <form action="/Libro/{{ $libro->id }}"method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a class="btn btn-primary" href="/Libro">Regresar</a>
    </form>
@endsection
