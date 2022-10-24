<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<link rel="stylesheet" href="">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <title>DWES-Itziar</title>

  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Funciones y Formularios</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../../Tema3/">Tema 3</a><a href="../../Codigo clase/index.html">/Codigo Clase</a><a href="index.html">/funciones y formulario</a>/funciones</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <h1>Funcion</h1>
    <? include("./funciones.php");
    saludo2("Itziar");
    echo "<br>";

    $nombre = "Itziar";
    saludo3($nombre);
    echo "<br>";


    //nombre no se cambia porque está por valor
    echo "<br> cambio de nombre: ".$nombre;
    echo "<br>";

    //Si quiero que cambie el valor tendria que:
    //1.que devuelva return
    //pasarle por referencia
    //global


    //global
    echo "<br> usando global: ";
    saludo4();
    echo "<br> cambio de nombre: ".$nombre;

    echo "<br> usando return ";
    $nombre="Maria";//lo 
    $nombre=saludo5($nombre);
    echo "<br> cambio de nombre: ".$nombre;

    //referencia
    $nombre="Maria";//lo 
    echo "<br> usando referencia ";
    saludo6($nombre);
    echo "<br> cambio de nombre: ".$nombre;


    //valores por defeto
    $nombre="Maria";//lo 
    echo "<br> Valores por defecto ";
    saludo7();//muestra mundo
    saludo7("Maria");

    //PASAR UN ARRAY (en php es un dato simple)
    $array= array();
    //rellena el array con la hora que se ha hecho la llamada
    rellenaArray($array);//no hya cambios, pero dentro de la funcion si
    print_r($array);//xq array se pasa por valor

    //LOS OBJETOS SÍ SE PASAN POR REFERENCIA
    class Cuadrado{
        public $lado=5;
    }

    //creamos un objeto de la clase cuadrado
    $objeto= new Cuadrado();
    cambiarLado($objeto,6);
    echo "<br>Objeto: ".$objeto->lado;//para que efectue cambios fuera hay que pasar por referencia

    ?>
    </div>

    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>

