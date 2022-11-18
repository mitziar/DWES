<?php
include('validaciones.php');
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
<link rel="stylesheet" href="css/estilos.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <title>DWES-Itziar</title>

  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Fichero csv</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
                <h4><a href="../../../">Tema 3</a><a href="../../">/Prácticas</a><a href="../">/PR010/</a>Ejercicio 2</h4>
        </div>
        <div class="row">            
        <?php
        if(isset($_REQUEST['guardar']) && validado()){


        }else{
            $cadenaMostrar;
            $nombreAlumno=$_REQUEST['alumno'];
            if(!file_exists('notas.csv')){
              echo "<h3>No existe el fichero notas</h3>";
            }else{
              if(!$fp=fopen('notas.csv','r')){
                echo "<h3>No se puede abrir el fichero</h3>";
              }else{
                while($notas=fgetcsv($fp,0,";")){
                  //Si notas
      
                  foreach ($notas as $element) {
                      if($notas[0]==$nombreAlumno){
                        $cadenaMostrar=$notas;
                      }
                    }

                  }
                  fclose($fp);
                }
              }
            }
            $patron='/^[0-9]{1,2}$/';
            $errores=array();

            ?><form action='alumno.php' method='get'>
                <label>Alumno</label>
                <input type="text" readonly name="nombreAlumno" value="<?php echo $cadenaMostrar[0]?>"><br>
                <label>Notas</label>
                <input type="text" name="nota1" value="<?php
                  if(!enviado()){
                    echo $cadenaMostrar[1];
                    ?>"><?
                  }elseif(enviado() && ((int)$_REQUEST['nota1']<0 || (int)$_REQUEST['nota1']>10) && preg_match($patron,$_REQUEST['nota1'])){
                    echo ">";
                    $errores.array_push('Nota uno no válida <br>');
                  }
                ?>
                <input type="text" name="nota2" value="<?php echo $cadenaMostrar[2]?>"><?php
                  if(enviado() && ($_REQUEST['nota2']<0 || $_REQUEST['nota2']>10) && preg_match($patron,$_REQUEST['nota2'])){
                    echo ">";
                    $errores.array_push('Nota dos no válida <br>');
                  } 
                ?>
                <input type="text" name="nota3" value="<?php echo $cadenaMostrar[3]?>"><?php
                  if(enviado() && ($_REQUEST['nota3']<0 || $_REQUEST['nota3']>10) && preg_match($patron,$_REQUEST['nota'])){
                    echo ">";
                    $errores.array_push('Nota tres no válida <br>');
                  } 
                ?>
                <input type="submit" value="guardar" name='guardar'>
            </form><?
            if(!$errores.length==0){
              for($indice in $errores){
                echo <span>$errores[$indice]</span>;
              }
            }
            ?>
           
        </div>    
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
</body>
</html>