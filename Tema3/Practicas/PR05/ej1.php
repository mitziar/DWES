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
     Escribe un programa que dado un array, ordénalo y devuelve otro array sin que haya elementos repetidos

        datos=[2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3]
    </pre>
    <?php
        $datos= array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);
        $solucion=array();
        $existe=0;


        sort($datos,SORT_NUMERIC);
        echo "Array ordenado: ";
        foreach ($datos as $clave) {
          echo $clave;
        }
        echo "<br>";
        foreach ($datos as $clave) {
          if(in_array($clave,$solucion)==0){
            array_push($solucion,$clave);
          }
        }
        echo "Array sin números repetidos: ";
        foreach ($solucion as $clave) {
          echo $clave;
        }
    ?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>