@extends('layouts.base')
@section ('content')
@foreach($prestamo as $prestamo)
    <p>¿Desea eliminar el prestamo: {{$prestamo->id}} - {{$prestamo->nombre_usuario}}?</p>
    <br>
    <br>
    <form action="/Prestamo/{{$prestamo->id}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a class= "btn btn-primary"href="/Prestamo">Regresar</a>

    </form>
@endforeach

@endsection