<html lang="es">
    <?php

    session_start();
   
    ?>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Tienda electrodomesticos">
    <meta name="author" content="itziar">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<link rel="stylesheet" href="./css/estilosLogin.css"> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <title>DWES-Itziar</title>

  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Prácticas</center></h2>
      </div>
    </div>

    <div class="container">

    <div class="row">
        <h4><a href="../../Practicas/">Tema 5</a>/Prácticas</h4>
        <hr>
    </div>

    <div class="row">
        <nav class="classnav">
            <a class="claseTransicion" href="./index.php">Index</a>
        </nav>
    </div>

    <hr>
    
    <div class="row">
         <?php

        if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        }
        unset($_SESSION['error']);

        ?>
    </div>
    <div class='dos'>
        <form action="./funciones/valida.php" method="post">
            <input type="hidden" name="codigo" value='<?php 
            if(isset($_REQUEST['codigo'])){
                echo $_REQUEST['codigo'];
            }
            ?>'>
            <div class='login'>
                <h3>Bienvenido</h3>
                <br>
                <label for="user">Usuario</label>
                <input class="ancho" type="text" name="user" id="user">
                <br>
                <label for="pass">Contraseña</label>
                <input class="ancho" type="password" name="pass" id="pass">
                <br>
                <input type="submit" value="Enviar" name="enviar">
                <p>
                    <a href='./paginas/altaUsuario.php'>Obtener cuenta</a>
                </p>
            </div>
        </form>
    </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body>
</html>