<?php
include ('./funcionesBD.php');
?>
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
        <h2><center>Prácticas del Tema 4</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../">Tema4</a><a href="../">/Practicas</a><a href="index.php">/PR12</a>/Insertar Registro</h4>
        </div>
      <!-- Example row of columns -->
      <div class="row"><?php
      if(isset($_REQUEST['id'])){
        $registro=obtenerRegistroPorId('notas','alumnos',$_REQUEST['id']);
        if(is_array($registro)){
          echo "<form action='leerTabla.php' method='get'>";
          echo "<label for='nombre'>Nombre: </label>";
          echo "<input type='text' value='".$registro[0][1]."' name='nombre' />";
          echo "<br>";
          echo "<label for='nota'>Nota: </label>";
          echo "<input type='text' value='".$registro[0][2]."' name='nota' />";
          echo "<br>";
          echo "<label for='fecha'>Fecha: </label>";
          echo "<input type='text' value='".$registro[0][3]."' name='fecha' />";
          echo "<br>";
          echo "<input type='submit' value='Eliminar Registro'>";
          echo "<input type='submit' value='Guardar cambios Registro'>";
          echo "</form>";
        }else{
          echo "<h3>".$registro."</h3>";
        }
        
      }else{
        echo "<form action='leerTabla.php' method='get'>";
        echo "<label for='nombre'>Nombre: </label>";
        echo "<input type='text' name='nombre' />";
        echo "<br>";
        echo "<label for='nota'>Nota: </label>";
        echo "<input type='text' name='nota' />";
        echo "<br>";
        echo "<label for='fecha'>Fecha: </label>";
        echo "<input type='text' name='fecha' />";
        echo "<br>";
        echo "<input type='submit' value='Guardar Registro'>";
        echo "</form>";
      }
      ?>
      </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>