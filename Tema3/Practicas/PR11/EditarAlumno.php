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
        <h1><a href="../../../../">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>FICHEROS CSV Y XML</center></h2>
      </div>
    </div>

    <div class="container">
    <div class="row">
    <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a><a href='index.php'>/PR11</a>/EditarAlumno.php</h4>
    </div>
    <div class="row">
        <?php
        //Recogemos el nombre del alumno de la página anterior
        $nombreAlumno=$_REQUEST['alumno'];

        if(enviado() && validado()){
            //Si se ha enviado y validado el formulario
            $notasXML=simplexml_load_file('notas.xml');
            foreach ($notasXML as $alumno) {
                if($alumno->children()[0]==$nombreAlumno){
                    $alumno->children()[1]=$_REQUEST['nota1'];
                    $alumno->children()[2]=$_REQUEST['nota3'];
                    $alumno->children()[3]=$_REQUEST['nota3'];
                }
            }
            /*$notasXML->asXML();*/
            Header('Location:LeerFicheroXML.php');
            exit();
            
        }else{
            //Si no se ha enviado ni validado el formulario, es la primera vez que entra:
                //1-Recorremos el archivo xml, para recoger los datos del alumno 
                //2-Mostramos los datos en el formulario
            $errores=array();
            $patron='/^[0-9]{1,2}$/';
            $datosAlumno=array();
            $todosAlumnos=simplexml_load_file('notas.xml');
            foreach( $todosAlumnos as $alumno){       
                    if($alumno->children()[0]==$nombreAlumno){
                          array_push($datosAlumno,$alumno);
                    }            
            }
        ?>
        <form action='EditarAlumno.php' method='get'>
            <h3>Editar notas alumno</h3>
            <label for='idNombreAlumno'>Alumno: </label>
            <input readonly name='alumno' id='idNombreAlumno' value='<?php echo $_REQUEST['alumno'] ?>'>

            <br>
            <label for='idNota1'>Nota 1: </label>
            <input name='nota1' id='idNota1' value='<?php 
                if(!enviado()){
                    echo $datosAlumno[0]->children()[1];
                }else{
                echo $_REQUEST['nota1'];
                }?>'><?php
                if( enviado() && ( ( floatval($_REQUEST['nota1'])<0 || floatval($_REQUEST['nota1'])>10 ) || !preg_match($patron,$_REQUEST['nota1']) )){
                    array_push($errores,'<br><span>La nota 1 no es válida</span>');
                }
                ?>

            <label for='idNota2'>Nota 2: </label>
            <input name='nota2' id='idNota2' value='<?php 
                if(!enviado()){ 
                    echo $datosAlumno[0]->children()[2];
                }else{
                    echo $_REQUEST['nota2'];
                }?>'><?php
                if( enviado() && ( ( floatval($_REQUEST['nota2'])<0 || floatval($_REQUEST['nota2'])>10 ) || !preg_match($patron,$_REQUEST['nota2']) )){
                    array_push($errores,'<br><span>La nota 2 no es válida</span>');
                }
                ?>


            <label for='idNota3'>Nota 3:</label>
            <input name='nota3' id='idNota1' value='<?php 
                if(!enviado()){
                    echo $datosAlumno[0]->children()[3];
                }else{
                    echo $_REQUEST['nota3'];
                }?>'><?php
                if( enviado() && (( floatval($_REQUEST['nota3'])<0 || floatval($_REQUEST['nota3'])>10 ) || !preg_match($patron,$_REQUEST['nota3']) )){
                    array_push($errores,'<br><span>La nota 3 no es válida</span>');
                }
                ?>
            <input type="submit" name='enviar' value="guardar">
        </form><?php
        if(enviado() && count($errores)>0){
            foreach($errores as $error){
                echo $error;
            }
        }
    }?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
</body>
</html>