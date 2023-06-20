@extends('layouts.base')
@section ('content')
<p>¿Desea eliminar el usuario: {{$usuario->nombre}}?</p>
<br>
<br>
<form action="/Usuario/{{$usuario->id}}"method="POST">
@csrf
@method('delete')
<button type="submit" class="btn btn-danger">Eliminar</button>
<a class= "btn btn-primary"href="/Usuario">Regresar</a>

</form>

@endsection