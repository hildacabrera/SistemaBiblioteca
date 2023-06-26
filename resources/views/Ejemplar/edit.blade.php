@extends('layouts.base')
@section ('content')

  <form action="/Ejemplar/{{$ejemplar->id}}"method="POST">
    @csrf
    @method('put')
    <div class="container mt-4">
        <h5>Editar Ejemplar</h5>
    
        <form>
          
          <div class="form-group col-6">
            <label for="localizacion">Localizacion:</label>
            <input type="text"id="localizacion" name="localizacion"value="{{$ejemplar->localizacion}}" maxlength="255" required="required"><br><br>
            <label for="cantidad">Cantidad</label>
            <input type="number"id="cantidad" name="cantidad"value="{{$ejemplar->cantidad}}" required="required"><br><br>
            <label for="libro_id">Titulo libro:</label>
                <select class="form-control" id="libro_id" name="libro_id">
                    @foreach ($libro as $libro)
                        @if ($libro->id == $ejemplar->libro_id)
                            <option value="{{ $libro->id }}" selected>{{ $libro->titulo }}</option>
                        @else
                            <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                        @endif
                    @endforeach
                </select>
            



    
          </div>
<a class="btn btn-primary" href="/Ejemplar">Regresar</a>
<button type= "submit" class="btn btn-primary ">Guardar</button>
</form>



@endsection