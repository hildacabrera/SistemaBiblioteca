@extends('layouts.base')
@section('content')
    <p>¿Desea eliminar el editorial: {{ $editorial->nombre }}?</p>
    <br>
    <form action="/Editorial/{{ $editorial->id }}"method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a class="btn btn-primary" href="/Editorial">Regresar</a>
    </form>
@endsection
