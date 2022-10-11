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
        <h2><center>Ejercicio 4</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../">Tema 2</a><a href="../">/Prácticas del Tema 2</a><a href="index.html">/P003-Practica 03</a>/Ejercicio 4</h4>
        </div>
        <div class="row">
            <p>
                Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos personas y muestre 
                las fechas de nacimiento de ambos y la diferencia de edad en años. 
            <p>
        </div>
        <hr>
        <div class="row">
        <?php
            /**Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos
             * personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años. 
             */
            $persona1=$_GET["persona1"];
            $fecha1=new DateTime($_GET["ano"].'-'.$_GET["mes"].'-'.$_GET["dia"]);
            $persona2=$_GET["persona2"];
            $fecha2=new DateTime($_GET["a"].'-'.$_GET["m"].'-'.$_GET["d"]);


            $intervalo=$fecha1->diff($fecha2);// es un objeto

            echo $persona1." nació el ".Date("d/m/Y", mktime(0,0,0,$_GET["mes"],$_GET["dia"],$_GET["ano"]))."</br>";
            echo $persona2." nació el ".Date("d/m/Y", mktime(0,0,0,$_GET["m"],$_GET["d"],$_GET["a"]))."</br>";


            echo "La diferencia de edad es de ".abs($intervalo->y)." año(s)</br>";

            echo "<a href=ej5.php?fichero=ej4.php>Ver código</a>";
        ?>
        </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>