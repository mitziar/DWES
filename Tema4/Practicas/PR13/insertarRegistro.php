<?php
include ('./funcionesBD.php');
include ('./validaciones.php');
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
<link rel="stylesheet" href="./css/estilos.css">
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
            <h4><a href="../../">Tema4</a><a href="../">/Practicas</a><a href="index.php">/PR13</a>/Insertar Registro</h4>
        </div>
      <div class="row"><?php
      if(enviado()&&validado()){
        if(isset($_REQUEST['guardar'])){
          $valores=array($_REQUEST['nombre'],$_REQUEST['nota'],$_REQUEST['fecha']);
          if(actualizarRegistroPorCampo('notas','alumnos','id',$_REQUEST['id'],$valores,'sds')){
            header('Location:leerTabla.php');
            exit();
          }else{
            echo "Error al actualizar registro";
          }
        }
        if(isset($_REQUEST['eliminar'])){
          if(eliminarRegistro($_REQUEST['id'],'notas')){
            header('Location:leerTabla.php');
            exit();
          } else{
            echo "Error al eliminar registro";
          }
        }
         if(isset($_REQUEST['insertar'])){
          $valores=array($_REQUEST['nombre'],$_REQUEST['nota'],$_REQUEST['fecha']);
           if(insertarRegistro('notas','alumnos',$valores,'sds')){
             echo "ha insertado";
             header('Location:leerTabla.php');
             exit();
           }else{
            echo "Error al insertar registro";
          }
         }
      }else{
        if(isset($_REQUEST['id'])){
          echo "<h3>Modificar o Borrar</h3>";
          $registro=obtenerRegistroPorId('notas','alumnos',$_REQUEST['id']);
          if(is_array($registro)){
            echo "<form action='insertarRegistro.php' method='get'>";
            echo "<input type='hidden' name='id' value='".$registro[0][0]."'/>"; 
            echo "<label for='nombre'>Nombre: </label>";
            echo "<input type='text' name='nombre' value='";
            $patron='/^[A-Z]{1}[a-z]{1,}$/';
            if(!enviado()){
              echo $registro[0][1]."'  />";
            }elseif(enviado() && preg_match($patron,$_REQUEST['nombre'])){
              echo $_REQUEST['nombre']."'  />";
            }elseif(enviado() && (!preg_match($patron,$_REQUEST['nombre'])||vacio($_REQUEST['nombre']))){
              echo "' />";
              echo "<span>El nombre debe contener una mayúscula y al menos una minúscula. No admite números. Ni el campo vacio.</span>";
            }
            echo "<br>";
            echo "<label for='nota'>Nota: </label>";
            echo "<input type='text' name='nota' value='";
            $patron='/^[0-9]{1,2}\.[0-9]{1,2}$/';
            if(!enviado()){
              echo $registro[0][2]."'  />";
            }elseif(enviado() && preg_match($patron,$_REQUEST['nota'])){
              echo $_REQUEST['nota']."'  />";
            }elseif(enviado() && (!preg_match($patron,$_REQUEST['nota'])||vacio($_REQUEST['nota']))){
              echo "' />";
              echo "<span>La nota debe contener uno o dos dígitos enteros, y uno o dos dígitos decimales. Indicar decimales con '.'. No dejar vacio</span>";
            }
            echo "<br>";
            echo "<label for='fecha'>Fecha: </label>";
            echo "<input type='text' name='fecha' value='";
            $patron='/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/';
            if(!enviado()){
              echo $registro[0][3]."'  />";
            }elseif(enviado() && preg_match($patron,$_REQUEST['fecha']) && isset($_REQUEST['guardar']) ){
              $fechaExplode=explode('-',$_REQUEST['fecha']);
              if($fechaExplode[1]>0 && $fechaExplode[1]<=12 && $fechaExplode[2]>0 && $fechaExplode[2]<=31){
                echo $_REQUEST['fecha']."'  />";
              }else{
                echo "' />";
                echo "<span>La fecha debe guardar el formato: AAAA-MM-DD.</span>";
              }
            }elseif(enviado() && isset($_REQUEST['guardar']) && !preg_match($patron,$_REQUEST['fecha']) || (!($fechaExplode[1]>0) || !($fechaExplode[1]<=12) || !($fechaExplode[2]>0) || !($fechaExplode[2]<=31))){
                echo "' />";
                echo "<span>La fecha debe guardar el formato: AAAA-MM-DD.</span>";
            }elseif(enviado() && vacio($_REQUEST['fecha']) && isset($_REQUEST['guardar'])){
                echo "' />";
                echo "<span>La fecha no se puede guardar vacia.</span>";
            }
            echo "<br>";
            echo "<input type='submit' name='eliminar'value='eliminar'>";
            echo "<input type='submit' name='guardar' value='guardar'>";
            echo "</form>";
          }else{
            echo "<h3>".$registro."</h3>";
          }
          
        }else{
          echo "<h3>Insertar</h3>";
          echo "<form action='insertarRegistro.php' method='get'>";
          echo "<label for='nombre'>Nombre: </label>";
          echo "<input type='text' name='nombre' value='";
          $patron='/^[A-Z]{1}[a-z]{1,}$/';
          if(!enviado()){
            echo "'  />";
          }elseif(enviado() && vacio($_REQUEST['nombre'])){
            echo "' />";
            echo "<span>El nombre no se puede guardar vacio.</span>";
          }elseif(enviado() && !vacio($_REQUEST['nombre']) && preg_match($patron,$_REQUEST['nombre'])){
            echo $_REQUEST['nombre']."'  />";
          }elseif(enviado() && !vacio($_REQUEST['nombre']) && !preg_match($patron,$_REQUEST['nombre'])){
            echo "' />";
            echo "<span>El nombre debe contener una mayúscula y al menos una minúscula. No admite números.</span>";
          }
          echo "<br>";
          echo "<label for='nota'>Nota: </label>";
          echo "<input type='text' name='nota' value='";
          $patron='/^[0-9]{1,2}\.[0-9]{1,2}$/';
          if(!enviado()){
            echo "'  />";
          }elseif(enviado() && !vacio($_REQUEST['nota']) && preg_match($patron,$_REQUEST['nota']) && isset($_REQUEST['insertar'])){
            echo $_REQUEST['nota']."'  />";
          }elseif(enviado() && !vacio($_REQUEST['nota']) && !preg_match($patron,$_REQUEST['nota']) && isset($_REQUEST['insertar'])){
            echo "' />";
            echo "<span>La nota debe tener uno o dos enteros y uno o dos decimale separados por un punto (.).</span>";
          }else if(enviado() && vacio($_REQUEST['nota']) && isset($_REQUEST['insertar'])){
            echo "' />";
            echo "<span>La nota no se puede guardar vacia.</span>";
          }
          echo "<br>";
          echo "<label for='fecha'>Fecha: </label>";
          echo "<input type='text' name='fecha' value='";
          $patron='/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/';
            if(!enviado()){
              echo "'  />";
            }elseif(enviado() && !vacio($_REQUEST['fecha']) && preg_match($patron,$_REQUEST['fecha'])){
              $fechaExplode=explode('-',$_REQUEST['fecha']);
              if($fechaExplode[1]>0 && $fechaExplode[1]<=12 && $fechaExplode[2]>0 && $fechaExplode[2]<=31){
                echo $_REQUEST['fecha']."'  />";
              }else{
                echo "' />";
                echo "<span>La fecha debe guardar el formato: AAAA-MM-DD.</span>";
              }
            }elseif(enviado() && !preg_match($patron,$_REQUEST['fecha']) || (!($fechaExplode[1]>0) || !($fechaExplode[1]<=12) || !($fechaExplode[2]>0) || !($fechaExplode[2]<=31))){
                echo "' />";
                echo "<span>La fecha debe guardar el formato: AAAA-MM-DD.</span>";
            }elseif(enviado() && vacio($_REQUEST['fecha'])){
                echo "' />";
                echo "<span>La fecha no se puede guardar vacia.</span>";
            }
          echo "<br>";
          echo "<input type='submit' name='insertar' value='insertar'>";
          echo "</form>";
        }
      }
      
      ?>
      </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>