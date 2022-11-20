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
        
        if(enviado() && validado()){//Si el formulario ha sido enviado y las notas introducidas son válidas
          
          $arrayNotas=array();//Guarda los registros del fichero. Cada elemento será un array con la información de cada alumno
          $nombreAlumno = $_REQUEST['nombreAlumno'];//Nombre del alumno para el que se van a modificar las notas
          if (!file_exists('notas.csv')) {
            echo "<span>El fichero no existe</span>";
          } else {
            //Existe el fichero notas.csv. Lo abrimos para leer los registros.
            if (!$fp = fopen('notas.csv', 'r')) {
              //No se puede abrir el fichero notas.csv
              echo "<span>No se puede abrir el fichero</span>";
            } else {
              //Mientras siga leyendo se guarda los datos del alumno en el arrayNotas
              //notas es el registro de cada alumno
              while ($notas = fgetcsv($fp, 0, ";")) {
                array_push($arrayNotas,$notas);
              } 
              fclose($fp);//Cerramos el fichero cuando haya leido todos los registros
              if (!$fp = fopen('notas.csv', 'w')) {//abrimos el fichero para escribir
                echo "<span>No se puede abrir el fichero</span>";
              }else {
                //Escribimos todos los registros que hemos almacenado previamente en el fichero,´
                // machacando la información que tenía.
                foreach ($arrayNotas as $key => $value) { //recorremos los registros que tenemos guardados
                if ($value[0] == $nombreAlumno) {
                  //SI el nombre del alumno que estamos modificando coincide con el de el array de registros,
                  //guardaremos los datos recogidos del formulario
                  $value[1] = $_REQUEST['nota1'];
                  $value[2] = $_REQUEST['nota2'];
                  $value[3] = $_REQUEST['nota3'];
                  fputcsv($fp, $value,';');
                } else {
                  //Si no coincide el nombre del alumno, guardamos los valores que tenia el fichero anteriormente
                  fputcsv($fp, $value,';');
                }
              }
              fclose($fp);//cerramos el fichero
             }
             //Enviamos al usuario la página donde ve todos los registro, donde podrá comprobar las modificaciones
                header('Location: ./LeerNotas.php');
                exit();
            }
          }
        }else{
          //Cuando el formulario no ha sido enviado ni validado, que puede ser:
            //-porque es la primera vez que accede a ver los datos del alumno
            //-porque ha fallado la validación de los campos. Existen campos erroneos.
            if(isset($_REQUEST['alumno'])){
              //-Es la primera vez que entra, y el nombre del alumno se guarda en 'alumno'
              $nombreAlumno=$_REQUEST['alumno'];
            }else{
              $nombreAlumno=$_REQUEST['nombreAlumno'];
              //-Ha enviado el formulario y ha fallado la validación. El alumno se guarda en nombreAlumno
            }

            //Mostramos los datos del alumno en el formulario
            $cadenaMostrar;//guardará los datos del alumno en concreto
            if(!$fp=fopen('notas.csv','r')){
              echo "<h3>No se puede abrir el fichero</h3>";
            }else{
              //Si abre el fichero que almacena los datos lo recorremos mientras lea
              while($notas=fgetcsv($fp,0,";")){
                foreach ($notas as $element) {
                  //para cada registro del fichero, si coincide el nombre del alumno, lo guardamos para mostrarlo
                  //en los campos del formulario
                    if($notas[0]==$nombreAlumno){
                      $cadenaMostrar=$notas;
                    }
                  }
                }
                //Cuando haya leido todos los registros del fichero, cerramos el fichero.
                fclose($fp);
              }
            }
            //Patron que comprueba que cada nota empieza y acaba en un número del 0 al 9, y que tenga un mínimo de un
            //dígito y un máximo de dos dígitos
            $patron='/^[0-9]{1,2}$/';
            $errores=array();//array que guardará los posibles errores que cometa el usuario al introducir las notas
            ?><form action='alumno.php' method='post'>
                <label>Alumno</label>
                <input type="text" readonly name="nombreAlumno" value="<?php 
                if(isset($_REQUEST['guardar']))
                {//Mostramos el nombre del alumno en el input correspondiente
                  echo $_REQUEST['nombreAlumno'];
                }else{
                  echo $cadenaMostrar[0];
                }?>"><br>
                <label>Notas</label>
                <input type="text" name="nota1" value="<?php
                //mostramos la primera nota, desde los valores del formulario si ha sido establecido
                //o desde el registro del formulario leido, si es la primera vez que accede a esta página
                  if(!isset($_REQUEST['nota1'])){
                    echo $cadenaMostrar[1];
                  }else{
                    echo $_REQUEST['nota1'];
                  }
                    ?>"><?
                    //Si ha sido enviado y la nota no es válida, guardamos el error para informar al usuario cuando intente guardar
                  if(enviado() && ($_REQUEST['nota1']<0 || $_REQUEST['nota1']>10) && !preg_match($patron,$_REQUEST['nota1'])){
                    array_push($errores,'Nota uno no válida <br>');
                  }
                ?>
                <input type="text" name="nota2" value="<?php
                //mostramos la segunda nota, desde los valores del formulario si ha sido enviado
                //o desde el registro del formulario leido, si es la primera vez que accede a esta página
                if(!isset($_REQUEST['nota2'])){
                  echo $cadenaMostrar[2];
                }else{
                  echo $_REQUEST['nota2'];
                }?>"><?php
                //Si ha sido enviado y la nota no es válida, guardamos el error para informar al usuario cuando intente guardar
                  if(enviado() && ($_REQUEST['nota2']<0 || $_REQUEST['nota2']>10) && !preg_match($patron,$_REQUEST['nota2'])){
                    array_push($errores,'Nota dos no válida <br>');
                  } 
                ?>
                <input type="text" name="nota3" value="<?php
                //mostramos la tercera nota, desde los valores del formulario si ha sido enviado
                //o desde el registro del formulario leido, si es la primera vez que accede a esta página
                if(!isset($_REQUEST['nota3'])){
                  echo $cadenaMostrar[3];
                }else{
                  echo $_REQUEST['nota3'];
                }?>"><?php
                //Si ha sido enviado y la nota no es válida, guardamos el error para informar al usuario cuando intente guardar
                  if(enviado() && ($_REQUEST['nota3']<0 || $_REQUEST['nota3']>10) && !preg_match($patron,$_REQUEST['nota3'])){
                    array_push($errores,'Nota tres no válida <br>');
                  } 
                ?>
                <input type="submit" value="guardar" name='guardar'>
            </form><?
            //Si hemos almacenado algún error con los datos que ha enviado el usuario, se le muestran, al final del formulario.
            if(count($errores)!=0){
              foreach ($errores as $key => $value) {
                echo '<span>'.$value.'</span>';
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