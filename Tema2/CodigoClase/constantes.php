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
        <h1><a href="../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Constantes</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../">Tema 2</a><a href="index.html">/Código de clase</a>/Constantes</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <pre>
        El nombre de las constantes van con mayúscula, se pueden definir y dar valor una sola vez. Se pueden
        con: -define("NOMBRE", valor) y -const NOMBRE = "valor". Por ejemplo: <br>
        <center>define(PI,3.1416)</center><br>
        <center>const USER = "Itziar"</center>

        Constantes predefinidas 
        PHP_VERSION, PHP_OS, TRUE, FALSE, E_ERROR, E_PARSE, E_ALL.
    </pre>
    <?php
        //Constante van con mayusculas, solo se pueden definir y dar valor una vez, si no error
        //dos formas: con define (le pasamos el nombre y su valor)
        //const 

        //para usarlas en otro archivo no necesitamos poner el $ delante para usarlas, basta con su nombre

        define("PI",3.1416);
        const USER = "itziar";
    ?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>
