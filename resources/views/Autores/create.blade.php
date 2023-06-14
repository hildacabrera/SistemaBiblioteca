@extends('layouts.base')
@section ('content')

  <form action="/Autores" method="POST">
    @csrf
    <div class="container mt-3">
        <h5>Crear Autor</h5>
         
          <div class="mb-3">
            <label for="nombre">Nombre Autor:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          
     
          <br>
<a class="btn btn-primary" href="/Autores">Regresar</a>
<button type= "submit" class="btn btn-primary ">Guardar</button>
</form>


@endsection