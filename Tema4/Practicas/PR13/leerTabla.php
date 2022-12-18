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
<link rel="stylesheet" href="css/estilos.css">
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
            <h4><a href="../../">Tema4</a><a href="../">/Practicas</a><a href="index.php">/PR13</a>/ Leer Tabla</h4>
        </div>
      <!-- Example row of columns -->
      <div class="row"><?php
            echo "<hr>";
            echo "<form action='leerTabla.php' method='get'>";
            echo "<h4>Buscador de registros (por nombre)</h4>";
            echo "<input type='text' name='buscado' placeholder='Introduzca nombre a buscar'>";
            echo "<input type='submit' value='Buscar' placeholder='Introduzca nombre a buscar'>";
            echo "</form>";
            echo "<a href='insertarRegistro.php'><input type='button' value='Introducir Nuevo Registro'></a>";
            echo "<hr>";
      if (isset($_REQUEST['buscado'])){
        $cabecera= obtenerCabeceraTabla('notas');
        if(is_array($cabecera)){
          echo "<table><tr>";
          foreach ($cabecera as $key => $value) {
            foreach($value as $k => $v){
              if($k==0){
                 echo "<th>".$v."</th>";
              }
            }
          }
          echo "<th>Modificar/Borrar</th>";
          echo "</tr>";
          $registros=obtenerRegistroPorCampo('notas', 'alumnos','nombre','%'.$_REQUEST['buscado'].'%');
          if(is_array($registros)){
            
            foreach ($registros as $key => $value) {
                
                echo "<tr><td>".$value[0]."</td><td>".$value[1]."</td><td>".$value[2]."</td><td>".$value[3]."</td><td><a href='insertarRegistro.php?id=".$value[0]."'><input type='button' value='Modificar/Borrar'></a></td></tr>";
            }
          }
          echo "</table>";
        }else{
          echo $cabecera;
        }
      }else{
        $cabecera= obtenerCabeceraTabla('notas');
        if(is_array($cabecera)){
          echo "<table><tr>";
          foreach ($cabecera as $key => $value) {
            foreach($value as $k => $v){
              if($k==0){
                 echo "<th>".$v."</th>";
              }
            }
          }
          echo "<th>Modificar/Borrar</th>";
          echo "</tr>";
          $registros=obtenerTodosRegistros('notas', 'alumnos');
          if(is_array($registros)){
            foreach ($registros as $key => $value) {
                echo "<tr><td>".$value[0]."</td><td>".$value[1]."</td><td>".$value[2]."</td><td>".$value[3]."</td><td><a href='insertarRegistro.php?id=".$value[0]."'><input type='button' value='Modificar/Borrar'></a></td></tr>";
            }
          }else{
            echo $registros;
          }
          echo "</table>";
        }else{
          echo $cabecera;
        }
      }

      ?>
      </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>