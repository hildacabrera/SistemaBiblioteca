@extends('layouts.base')
@section ('content')

  <form action="/Autores/{{$autor->id}}"method="POST">
    @csrf
    @method('put')
    <div class="container mt-4">
        <h5>Editar Autor</h5>
    
        <form>
          
          <div class="form-group col-6">
            <label for="nombre">Nombre Autor:</label>
            <input type="text"id="nombre" name="nombre"value="{{$autor->nombre}}">
    
          </div>
<a class="btn btn-primary" href="/Autores">Regresar</a>
<button type= "submit" class="btn btn-primary ">Guardar</button>
</form>



@endsection