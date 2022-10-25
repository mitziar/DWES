<?php
include('funciones.php');
?>
<html lang="es"><head>
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
        <h1><a href="../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Ejercicio 1</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a>/PR07/Ejercicio 1</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
        <?php
        echo '<p> Esto es un párrafo al que añado br y...'.br();
        echo '... y continuo escribiendo.</p>';

        echo "ahora pruebo la funcion h1 con la palabra Título".h1("Título");

        $cadena = "hola mundo";
        echo "ahora pruebo la funcion p($cadena) con la $cadena= hola mundo.";
        
        echo br().p($cadena);
        echo br();
        echo p("muestro la función self()");
        echo br();
        self();
        echo br();
        echo p("ahora pruebo la función dni() con el numero 71029173");
        echo br();
        echo p("la letra es: ").letraDni('71029173').br();
        $lista=array();
        generarAleatorios($lista,1,10,5,false);
        echo p("Los datos del array aleatorio son: ").br();
        print_r($lista);
        ?>

    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>