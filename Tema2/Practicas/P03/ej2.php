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
        <h2><center>Ejercicio 2</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../">Tema 2</a><a href="../">/Prácticas del Tema 2</a><a href="index.html">/P003-Practica 03</a>/Ejercicio 2</h4>
        </div>
        <div class="row">
            <p>
                Crea una página a la que se le pase por url una variable con el nombre que quieras y muestre el valor de la variable, 
                el tipo, si es numérico o no y si lo es, si es entero o float.
            <p>
        </div>
        <hr>
        <div class="row">
        <?php
            /**
             * Crea una página a la que se le pase por url una variable con el nombre que quieras y
             * muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float.
             */

            $parametro=$_GET["clave"];


            echo "El valor de la variable es: <strong><em>".$parametro."</em></strong><br>";

            echo "El tipo de la variable es: <strong><em>".gettype($parametro)."</em></strong><br>";

            $esFloat= ((int)$parametro==$parametro) ? "Es numerico y es int <br>" : "Es numerico y es float<br>";

            $esNumerico = is_numeric($parametro) ? $esFloat : "No es numerico<br>";

            echo $esNumerico;
           

            echo "<a href=ej5.php?fichero=ej2.php>Ver código</a>";
        ?>
        </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>