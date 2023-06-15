@extends('layouts.base')
@section('content')


<table class="table table-striped">
    <thead>
<tr>
    <th colspan="4"> 
        <a class="btn btn-primary" href="/Autores/create">Agregar Autor</a>
    </th>
    
</tr>

<tr>
    <th>Código</th>
     <th>Nombre Autor</th>     
</tr>
    </thead>

<tbody>
@foreach($autor as $autor)
<tr>
<td>{{$autor->id}}</td>
<td>{{$autor->nombre}}</td>
<td><a class="btn btn-primary" href="/Autores/{{$autor->id}}/edit"><small>Modificar</small></a>
  <a class="btn btn-danger" href="/Autores/{{$autor->id}}/delete"><small>Eliminar</small></a>
</td>
</tr>

@endforeach
</tbody>
</table>
<br>
<br>
<br>

@endsection