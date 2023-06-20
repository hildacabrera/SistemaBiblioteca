@extends('layouts.base')
@section('content')
    <form action="/Prestamo/{{ $prestamo->id }}"method="POST">
        @csrf
        @method('put')
        <div class="container mt-3">
            <h5>Crear Prestamo</h5>

            <div class="mb-3">
                <label for="fecha_pres">Fecha prestamo:</label>
                <input type="date" class="form-control" id="fecha_pres" name="fecha_pres" value="{{$prestamo->fecha_pres}}">
                <label for="fecha_dev">Fecha devolucion:</label>
                <input type="date" class="form-control" id="fecha_dev" name="fecha_dev" value="{{$prestamo->fecha_dev}}">
                <label for="usuario_id">Usuario:</label>
                <select class="form-control" id="usuario_id" name="usuario_id">
                    @foreach ($usuario as $usuario)
                        @if ($usuario->id == $prestamo->usuario_id)
                            <option value="{{ $usuario->id }}" selected>{{ $usuario->nombre }}</option>
                        @else
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="editorial_id">
                    <h5>Ejemplar:</h5>
                </label>
                <select class="form-control" id="ejemplar_id" name="ejemplar_id">
                    @foreach ($ejemplar as $ejemplar)
                        @if ($ejemplar->id == $prestamo->ejemplar_id)
                            <option value="{{ $ejemplar->id }}" selected>{{ $ejemplar->localizacion }}</option>
                        @else
                            <option value="{{ $ejemplar->id }}">{{ $ejemplar->localizacion }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <br>
            <a class="btn btn-primary" href="/Prestamo">Regresar</a>
            <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
    </form>
@endsection
