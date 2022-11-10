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
            <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a>/PR09-Formulario y expresiones regulares</h4>
    </div>
   
        <h3>Formulario y expresiones regulares</h3><hr>
        <form action="formulario.php" method="post" enctype="multipart/form-data">
            <p>
                <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
                <label for="idNombre">Nombre</label>
                <input type="text" name="nombre" id="idNombre" value="<?php
                $patron='/\D{3,}/';
                if (!vacio('nombre') && preg_match($patron,$_REQUEST['nombre']) && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['nombre'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('nombre') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Debe introducir el nombre</span>
                    <?php
                    }elseif(existe('nombre') && !preg_match($patron,$_REQUEST['nombre'])){
                        ?>
                        <span>El nombre debe contener 3 caracteres mínimo</span>
                        <?php
                    }
                ?>
            </p>
            <p>
                <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
                <label for="idApellidos">Apellidos</label>
                <input type="text" name="apellidos" id="idApellidos" value="<?php
                $patron='/\D{3,}(\s)\D{3,}/';
                if (!vacio('apellidos') && preg_match($patron,$_REQUEST['apellidos'])){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['apellidos'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('apellidos') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Debe introducir los apellidos</span>
                    <?php
                    }elseif(existe('apellidos') && !preg_match($patron,$_REQUEST['apellidos'])){
                        ?>
                        <span>Cada apellido debe tener al menos 3 caracteres y un espacio entre cada apellido</span>
                        <?php
                    }
                
                ?>
            </p>
            <p>
                <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
                <label for="idContrasena">Contraseña</label>
                <input type="password" name="contrasena" id="idContrasena" value="<?php
                $patron='/[A-Z]+[a-z]+[0-9]+/';
                if (!vacio('contrasena') && preg_match($patron,$_REQUEST['contrasena']) && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['contrasena'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('contrasena') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Debe introducir una contraseña</span>
                    <?php
                    }elseif(existe('contrasena') && !preg_match($patron,$_REQUEST['contrasena'])){
                        ?>
                        <span>La contraseña debe contener al menos una mayúscula, una minúscula y un número</span>
                        <?php
                    }
                ?>
            </p>
            <p>
                <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
                <label for="idContrasena">Contraseña</label>
                <input type="password" name="contrasenaRepetida" id="idContrasenaRepetida" value="<?php
                if (!vacio('contrasenaRepetida') && enviado() && ($_REQUEST['contrasena']===$_REQUEST['contrasenaRepetida'])){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['contrasenaRepetida'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('contrasenaRepetida') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Introduce repetir contraseña</span>
                    <?php
                    }elseif(existe('contrasenaRepetida') && !($_REQUEST['contrasena']===$_REQUEST['contrasenaRepetida'])){
                        ?>
                        <span>No coinciden las contraseña</span>
                        <?php
                    }
                ?>
            </p>
            <p>

                <label for="idFecha">Fecha</label>
                <input type="tex" name="fecha" id="idFecha" placeholder="AAAA-MM-DD"value="<?php
                $patron='/\d{4}(\-)\d{2}(\-)\d{2}/';

                if (existe('fecha') && enviado() && preg_match($patron,$_REQUEST['fecha']) && esFechaValida('fecha')){
                        echo $_REQUEST['fecha'];//el value es
                    }
                ?>">
                <?php
                if (vacio('fecha') && enviado())
                {             
                ?>
                <span>Debe introducir fecha</span>
                <?php
                }elseif(enviado() && !esFechaValida('fecha')){
                ?><span>Introducir fecha válida</span><?php
                    }
                ?>
            </p>
            <p>
                <label for="idDni">DNI</label>
                <input type="text" name="dni" id="idDni" placeholder="12345678P"value="<?php
                $patron = '/^[0-9]{8}[A-Z]{1}$/';

                if (!vacio('dni') && enviado() && preg_match($patron,$_REQUEST['dni']) && letraDNI('dni')){//si el nombre no está vacio y el formulario ha sido enviado         
                        echo $_REQUEST['dni'];//el value es
                    }
                ?>">
                <?php
                    if (vacio('dni') && enviado())
                    {//si el nombre está vacio y el formulario ha sido enviado                 
                    ?>
                    <span>Debe introducir DNI</span>
                    <?php
                    }elseif(!vacio('dni') && enviado() && (!preg_match($patron,$_REQUEST['dni']) || !letraDNI('dni'))){
                    ?><span>Introduzca un DNI válido</span><?php
                    }
                ?>
            </p>
            <p>
                <label for="idEmail">Email</label>
                <?php
                $patron="/^\D+(@)\D+(\.)\D{2,}$/";
                ?>
                <input type="text" name="email" id="idEmail" placeholder="alguien@email.com" value=<?php
                    if(enviado() && existe('email') && preg_match($patron,$_REQUEST['email'])){
                        echo $_REQUEST['email'];
                    }
                ?>>
                <?php
                    if (enviado() && vacio('email')){
                        echo "<span>Introduce email<span>";
                    }elseif(enviado() && existe('email') && !preg_match($patron,$_REQUEST['email'])){
                        ?><span>Introduzca email válido</span><?php
                    }
                ?>
            </p>
            <p>
                <label for='idImagen'>Introducir imagen (*.jpg,*.png,*.bmp): </label>
                <input type="file" name="imagen" id="idImagen">
                <?php

                    if(enviado() && empty($_FILES)){
                        echo "<span>Introduce documento</span>";
                    }
                    if(existe('fichero')&& enviado()){
                        echo "<img src='" . $_REQUEST['fichero']. "' alt='Imagen' width='100px' height='100px'>";
                        echo "<input type='hidden' name='fichero' value='".$_REQUEST['fichero']."'>";
                    }
                    if(isset($_FILES) && enviado()){
                        $patron='/^[\D|\d]+(\.)(jpg)|(bmp)|(png)$/';
                       
                        if( !existe('fichero') && preg_match($patron,$_FILES['imagen']['name'])){
                            $directorio='./uploads/';
                            $rutaImagen=$directorio.$_FILES['imagen']['name'];
                            if(move_uploaded_file($_FILES['imagen']['tmp_name'],$rutaImagen)){
                                echo "<input type='hidden' name='fichero' value='".$rutaImagen."'>";
                                echo "<img src='" . $rutaImagen. "' alt='Imagen' width='100px' height='100px'>";
                            }else{
                                echo "<span>No se ha podido guardar el documento</span>";
                            }
                        }elseif(existe('fichero') && !preg_match($patron,$_FILES['imagen']['name'])){
                            echo "<span>El documento no tiene un formato válido</span>";
                        }
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