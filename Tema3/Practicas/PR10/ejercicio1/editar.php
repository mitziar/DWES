
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
        <h1><a href="../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>FICHEROS</center></h2>
      </div>
    </div>

    <div class="container">
    <div class="row">
            <h4><a href="../../../">Tema 3</a><a href="../../">/Prácticas</a><a href="../">/PR010/</a>Ejercicio 1</h4>
    <div class="row">
        <?php
            if(!empty($_REQUEST['fichero'])){
                $nombre=$_REQUEST['fichero'];
            }
        ?>
        <form action="editar.php" method="post"><?php
                    if(isset($_REQUEST['guardar'])&&!empty($_REQUEST['fichero'])){
                        if(!$fp=fopen($nombre,"w")){
                            echo "<h2>No se ha podido abrir. No such file or directorio</h2>";
                        }else{
                            fwrite($fp,$_REQUEST['textoNuevo'],strlen($_REQUEST['textoNuevo']));
                            fclose($fp);
                        }
                        header('Location: ./leer.php?fichero='.$nombre);
                        exit();
                    }elseif(isset($_REQUEST['guardar'])&&empty($_REQUEST['fichero'])){
                        ?><span>Es obligatorio el nombre del fichero</span>
                        <label for='idNombreFichero'>Nombre del fichero</label>
                        <input name="fichero" id='idNombreFichero'><?php
                    }elseif(isset($_REQUEST['volver'])){
                        header('Location: ./EligeFichero.php');
                        exit(); 
                    }elseif(!isset($_REQUEST['guardar']) && !empty($_REQUEST['fichero'])){
                        ?><input type="hidden" name="fichero" value="<? echo $nombre?>"><?
                    }elseif(!isset($_REQUEST['guardar']) && empty($_REQUEST['fichero'])){
                        ?><label for='idNombreFichero'>Nombre del fichero</label>
                        <input name="fichero" id='idNombreFichero'><?
                    }?>
                <textarea name='textoNuevo'><?php 
                if(!empty($_REQUEST['fichero'])){
                    if(file_exists($nombre)){
                        if(!$fp=fopen($nombre,"r")){
                            echo "<h2>No se ha podido abrir. No such file or directorio</h2>";
                        }else{
                            //miestras pueda leer una linea en el fichero
                            while($lea = fgets($fp,filesize($nombre))){
                                echo $lea;
                            }
                            fclose($fp);
                        }
                    }
                }
            ?></textarea>
            <br>
            <input type="submit" name="volver" value="Volver a elegir fichero">
            <input type="submit" name="guardar" value="Guardar">
        </form>
    </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
        <p><center>Página de Itziar</center></p>
    </footer>
</body>
</html>