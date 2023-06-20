<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="{{ asset('assets/funciones/funcion.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
   
    <script src="{{ asset('assets/css/bootstrap-5.1.3-dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
    <title>Sistema de Biblioteca IUDigital</title>
</head>

<body>
    <!--Crear Menu-->
    <header>
        <nav class="menu">
            <div class="hamburger" onclick="mostrar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <label class="logo"><img src="{{ asset('assets/imagenes/LOGO.png') }}" alt="logo IUDIGITAL"></label>
            <ul id="sliding_menu">
                <li><span class="close" onclick="ocultar()">X</span> </span></li>
                <li><a href="/Autor">Autores</a></li>
                <li><a href="/Editorial">Editoriales</a></li>
                <li><a href="/Libro">Libros</a></li>
                <li><a href="/Ejemplar">Ejemplares</a></li>
                <li><a href="/Prestamo">Prestamos</a></li>
                <li><a href="/Usuario">Usuarios</a></li>
            </ul>
        </nav>
    </header>
	
    <div class="banner">
      <div class="centrar">
        <div class="container fondo">
          <h1>Catálogo de biblioteca</h1>
          <div class="row">
            <div id="rojo" class="col-12">
              @yield('content')
            </div>
          </div>
        </div>
      </div> 
    </div> 
</body>
</html>