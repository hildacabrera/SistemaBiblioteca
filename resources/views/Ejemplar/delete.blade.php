@extends('layouts.base')
@section ('content')
<p>¿Desea eliminar ejemplar: {{$ejemplar->localizacion}}?</p>
<br>
<br>
<form action="/Ejemplar/{{$ejemplar->id}}"method="POST">
@csrf
@method('delete')
<button type="submit" class="btn btn-danger">Eliminar</button>
<a class= "btn btn-primary"href="/Ejemplar">Regresar</a>

</form>

@endsection