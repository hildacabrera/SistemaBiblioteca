@extends('layouts.base')
@section ('content')
<p>¿Desea eliminar el autor: {{$autor->nombre}}?</p>
<br>
<br>
<form action="/Autores/{{$autor->id}}"method="POST">
@csrf
@method('delete')
<button type="submit" class="btn btn-danger">Eliminar</button>
<a class= "btn btn-primary"href="/Autores">Regresar</a>

</form>

@endsection