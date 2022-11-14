
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
    <h4><a href="../../../">Tema 3</a><a href="../../">/Prácticas</a><a href=../>/PR010/</a>Ejercicio 1</h4>
    </div>
    <div class="row">
        <form action="EligeFichero.php" method="get">
            <p>
                <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
                <label for="idNombre">Nombre</label>
                <input type="text" name="nombre" id="idNombre"><?php
                    if(empty($_REQUEST['nombre']) && isset($_REQUEST['leer'])){
                        ?><span>Escribe el nombre del fichero a leer</span><?php
                    }elseif(!empty($_REQUEST['nombre']) && isset($_REQUEST['leer'])){
                        if(!file_exists($_REQUEST['nombre'])){?>
                            <span>El archivo no existe o no tiene permisos</span><?php
                        }else{
                                //redirige a otra página 
                                header('Location: ./leer.php?fichero='.$_REQUEST['nombre']);
                                exit();
                        }
                    }
                    if(empty($_REQUEST['nombre']) && isset($_REQUEST['editar'])){
                        ?><span>Escribe el nombre del fichero a editar</span><?php
                    }elseif(!empty($_REQUEST['nombre']) && isset($_REQUEST['editar'])){
                        if(!file_exists($_REQUEST['nombre'])){
                            if($fp=fopen($_REQUEST['nombre'],"w")){
                                echo "<h2>No se ha podido crear</h2>";
                                fclose($fp);
                                //redirige a otra página 
                                header('Location: ./editar.php?fichero='.$_REQUEST['nombre']);
                                exit();
                            }
                        }else{
                            header('Location: ./editar.php?fichero='.$_REQUEST['nombre']);
                            exit();
                        }
                    }                  
                ?>
            </p>
            <input type="submit" name="leer" value="Leer">
            <input type="submit" name="editar" value="Editar">
        </form>    
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
</body>
</html>