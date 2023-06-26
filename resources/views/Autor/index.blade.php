@extends('layouts.base')
@section('content')

@if (isset($_REQUEST['error']) && $_REQUEST['error'] != "")
    <div class="alert alert-danger">{{ $_REQUEST['error'] }}</div>
@endif
<table class="table table-striped">
    <thead>
<tr>
    <th colspan="4"> 
        <a class="btn btn-primary" href="/Autor/create">Agregar Autor</a>
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
<td><a class="btn btn-primary" href="/Autor/{{$autor->id}}/edit"><small>Modificar</small></a>
  <a class="btn btn-danger" href="/Autor/{{$autor->id}}/delete"><small>Eliminar</small></a>
</td>
</tr>

@endforeach
</tbody>
</table>
<br>
<br>
<br>

@endsection