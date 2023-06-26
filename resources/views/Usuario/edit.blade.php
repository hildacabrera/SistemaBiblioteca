@extends('layouts.base')
@section ('content')

  <form action="/Usuario/{{$usuario->id}}"method="POST">
    @csrf
    @method('put')
    <div class="container mt-4">
        <h5>Editar Usuario</h5>
    
        <form>
          
          <div class="form-group col-6">
            <label for="nombre">Nombre Usuario:</label>
            <input type="text"id="nombre" name="nombre"value="{{$usuario->nombre}}" maxlength="255" required="required"><br><br>
            <label for="Telefono">Telefono</label>
            <input type="number"id="telefono" name="telefono"value="{{$usuario->telefono}}" required="required"><br><br>
            <label for="direccion">Direccion</label>
            <input type="text"id="direccion" name="direccion"value="{{$usuario->direccion}}" required="required"><br><br>      
    
          </div>
<a class="btn btn-primary" href="/Usuario">Regresar</a>
<button type= "submit" class="btn btn-primary ">Guardar</button>
</form>



@endsection