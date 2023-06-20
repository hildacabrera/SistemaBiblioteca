@extends('layouts.base')
@section('content')


<table class="table table-striped">
    <thead>
<tr>
    <th colspan="4"> 
        <a class="btn btn-primary" href="/Usuario/create">Agregar Usuario</a>
    </th>
    
</tr>

<tr>
    <th>Código</th>
     <th>Nombre Usuario</th>
     <th>Telefono</th>
     <th>Dirección</th> 
</tr>
    </thead>

<tbody>
@foreach($usuario as $usuario)
<tr>
<td>{{$usuario->id}}</td>
<td>{{$usuario->nombre}}</td>
<td>{{$usuario->telefono}}</td>
<td>{{$usuario->direccion}}</td>
<td><a class="btn btn-primary" href="/Usuario/{{$usuario->id}}/edit"><small>Modificar</small></a>
  <a class="btn btn-danger" href="/Usuario/{{$usuario->id}}/delete"><small>Eliminar</small></a>
</td>
</tr>

@endforeach
</tbody>
</table>
<br>
<br>
<br>

@endsection