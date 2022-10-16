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
        <h2><center>Ejercicio 1</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
        <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a><a href="index.html">/PR05</a>/Ejercicio 1</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <pre>
    Escribe un programa que pida por pantalla el tamaño de una matriz (Ej lado=4). Rellene de la siguiente manera:

        1 | 1 | 1 | 1
        1 | 2 | 3 | 4
        1 | 3 | 6 | 10
        1 | 4 |10 | 20
    </pre>
    <form name="formulario" method="get" action="ej3.php">
    <label for="dato">Introduza el lado:</label>
    <input name="dato" >
    <input type="submit"/>
    </form>
    <?php
        $lado = $_GET['dato'];
        $matriz = array(array());
        for($i=0;$i<$lado;$i++){
            $matriz[0][$i] = 1;
        }
        for($i=0;$i<$lado;$i++){
            $matriz[$i][0] = 1;
        }

   
        for ($i=1;$i<$lado;$i++){
            for ($j=1;$j<$lado;$j++){
                $matriz[$i][$j]= $matriz[$i-1][$j] +$matriz [$i][$j-1];
            }
        }

        for ($i=0;$i<$lado;$i++){
            for ($j=0;$j<$lado;$j++){
                echo "&nbsp;".$matriz[$i][$j]."&nbsp;|";
            }
            echo "<br>";
        }

    ?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>

</body></html>