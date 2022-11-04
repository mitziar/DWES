<?php
    require("./validaciones.php");
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
        <h1><a href="../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Formulario y expresiones regulares</center></h2>
      </div>
    </div>

    <div class="container">
    <div class="row">
            <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a>/PR08/Formulario y expresiones regulares</h4>
    </div>
    
       
            
        <h3>Formulario y expresiones regulares</h3><hr>
        <form action="formulario.php" method="post" enctype="multipart/form-data">
            <p>
                <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="idNombre" value="<?php
                $patron='/\D{3}/';
                if (!vacio('nombre') && preg_match($patron,$_REQUEST['nombre'])>1){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['nombre'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('nombre') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Debe introducir el nombre</span>
                    <?php
                    }
                ?>
            </p>
            <p>
                <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
                <label for="apellidos">Apellidos</label>
                <input type="text" name="nombre" id="idNombre" value="<?php
                $patron='//';
                if (!vacio('apellidos') && preg_match($patron,$_REQUEST['apellidos'])){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['nombre'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('apellidos') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Debe introducir los apellidos</span>
                    <?php
                    }
                ?>
            </p>
            <p>
                <label for="idPass">Contraseña</label>
                <input type="password" name="pass" id="idPass" value=<?php
                if(enviado() && existe('pass')){
                    echo $_REQUEST['pass'];
                }
                ?>><?php
                if(enviado() && vacio('pass')){
                    echo "<span>Introduce contraseña<span>";
                }
                ?>
            </p>
            <p>

                <label for="idFecha">Fecha</label>
                <input type="date" name="fecha" id="idFecha" value="<?php
                if (!vacio('fecha') && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['fecha'];//el value es
                    }
                ?>">
                <?php
                if (vacio('fecha') && enviado())
                {//si el nombre está vacio y el formulario ha sido enviado                 
                ?>
                <span>Debe introducir fecha</span>
                <?php
                }
            ?>
            </p>
            <p>
                <label for="dni">DNI</label>
                <input type="text" name="dni" id="idDni" value="<?php
                if (!vacio('dni') && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['dni'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('dni') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Debe introducir alfanumerico</span>
                    <?php
                    }
                ?>
            </p>
            <p>
                <label for="idEmaill">Email</label>
                <input type="text" name="email" id="idEmail" placeholder="alguien@email.com" value=<?php
                    if(enviado() && existe('email')){
                        echo $_REQUEST['email'];
                    }
                ?>>
                <?php
                    if (enviado() && vacio('email')){
                        echo "<span>Introduce email<span>";
                    }
                ?>
            </p>
            
            <p>
                <label for="idDocumento">Subir documento</label>
                <input type="file" name="documento" id="idDocumento">
                <?php

                    if(enviado() && isset($_FILES)){
                        $rutaGuardado = "./uploads/";

                        // Se le establece el nombre al archivo a guardar
                        $rutaConNombreFichero = $rutaGuardado .  $_FILES['documento']['name'];

                        // Si se mueve el fichero del sitio temporal a la ruta especificada...
                        if(move_uploaded_file( $_FILES['documento']['tmp_name'],$rutaConNombreFichero))
                        {
                        echo "<br>El fichero se ha guardado correctamente.<br>";
                        echo "<img src='" . $rutaConNombreFichero . "' alt='Imagen' width='100px' height='100px'>";
                        }
                    }
                    if(enviado() && empty($_FILES)){
                        echo "<span>Introduce documento<span>";
                    }
                ?>
            </p>
            <p>
                <input type="submit" value="Enviar" name="enviar">
            </p>
        </form>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
</body>
</html>