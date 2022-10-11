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
            <h4><a href="../../">Tema 2</a><a href="../">/Prácticas del Tema 2</a><a href="index.html">/P003-Practica 03</a>/Ejercicio 1</h4>
        </div>
        <div class="row">
            <p>
            Muestra el nombre del fichero que se está ejecutando. Muestra la IP del equipo desde el que accedes. Muestra el path donde se encuentra el fichero que se está ejecutando. 
            Muestra la fecha y hora actual (2022-09-4 19:17:18). Muestra la fecha y hora actual en Oporto formateada (día de la semana, día de mes de año, hh:mm:ss , Zona horaria). 
            Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy de tu cumpleaños. Calcular la fecha y el día de la 
            semana de dentro de 60 días.
            </p>
        </div>
        <div class="row">
          <hr>
        <?php

            /**
             * Muestra el nombre del fichero que se está ejecutando. 
             */
            echo "El nombre del archivo que se está ejecutando es: <strong><em>".$_SERVER['PHP_SELF']."</em></strong><br>";

            /**
             * Muestra la dirección IP del equipo desde el que estás accediendo
             */
            echo "El nombre de la IP del equipo desde el que accedo es: <strong><em>".$_SERVER['REMOTE_ADDR']."</em></strong><br>";

            /**
             * Muestra el path donde se encuentra el fichero que se está ejecutando. 
             */
            echo "Path donde se encuentra el fichero que se está ejecutando: <strong><em>".$_SERVER['SCRIPT_FILENAME']."</em></strong><br>";

            /**
             * Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18. 
             */
            date_default_timezone_set("Europe/Madrid");
            echo "Fecha y hora actual formateada: <strong><em>".date("Y-m-d H:i:s")."</em></strong><br>";

            /**
             * Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de
             * mes de año, hh:mm:ss , Zona horaria). 
             */
            date_default_timezone_set("Europe/Lisbon");
            echo "La fecha y hora actual en Oporto formateada (día de la semana, día de mes de año, hh:mm:ss , Zona horaria): ";
            echo "<strong><em>".date("d m Y H:i:s").".</em></strong> "; 
            echo "Zona horaria: <strong><em>".date_default_timezone_get()."</em></strong><br>";

            /**
             * Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy
             * de tu cumpleaños
             */

            echo "Variable en timestamp fecha de mi cumpleaños(dd/mm/yyyy) <strong><em>".date("d/m/Y",strtotime("21 July 1988"))."</em></strong><br>";

            /**
             * Calcular la fecha y el día de la semana de dentro de 60 días. 
             */
            setlocale(LC_TIME, "es_ES");
            $fecha60=strtotime("+ 60 days");
            echo "Fecha y dia dentro de 60 días: <strong><em>".date("D, d m Y",$fecha60)."</strong></em><br>";

            echo "<a href=ej5.php?fichero=ej1.php>Ver código</a>";

        ?>
        </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>