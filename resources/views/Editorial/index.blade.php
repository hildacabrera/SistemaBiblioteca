@extends('layouts.base')
@section('content')


<table class="table table-striped">
    <thead>
<tr>
    <th colspan="4"> 
        <a class="btn btn-primary" href="/Editorial/create">Agregar Editorial</a>
    </th>
    
</tr>

<tr>
    <th>Código</th>
     <th>Nombre Autor</th>     
</tr>
    </thead>

<tbody>
@foreach($editorial as $editorial)
<tr>
<td>{{$editorial->id}}</td>
<td>{{$editorial->nombre}}</td>
<td><a class="btn btn-primary" href="/Editorial/{{$editorial->id}}/edit"><small>Modificar</small></a>
  <a class="btn btn-danger" href="/Editorial/{{$editorial->id}}/delete"><small>Eliminar</small></a>
</td>
</tr>

@endforeach
</tbody>
</table>
<br>
<br>
<br>

@endsection