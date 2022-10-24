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
<link rel="stylesheet" href="">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Formularios</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../../Tema3/">Tema 3</a><a href="../../Codigo clase/">/Codigo Clase</a><a href="index.html">/fuciones y formulario</a>/formulario</h4>
        </div>
        <div class="roW">
        <?php
    require("./validaFormularioFunciones.php");
?>

    <form action="./formulario.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre"  value="<?php
            if (vacio("nombre") && enviado()){//si el nombre está vacio y el formulario ha sido enviado         
                    echo $_REQUEST["nombre"];
                }

            ?>">
        </p>
        <p>
            <label for="idPass">Contraseña</label>
            <input type="password" name="pass" id="idPass" value="<?php
            if (vacio("password") && enviado()){//si el nombre está vacio y el formulario ha sido enviado         
                    echo $_REQUEST["pass"];
                }
            ?>">
        </p>
        <p><b>Genero</b>
            <label for="idMasculino">Masculino</label>
            <input type="radio" name="genero" id="idMasculino" value="masculino"
            <?php
                if(enviado() && existe("genero") && $_REQUEST["genero"]=="masculino"){
                    echo "checked";
                }
            ?>
            >
            <label for="idFemenino">Femenino</label>
            <input type="radio" name="genero" id="idFemenino" value="femenino"<?php
                if(enviado() && existe("genero") && $_REQUEST["genero"]=="femenino"){
                    echo "checked";
                }
            ?>
            >
        </p>

        <p><b>Asignaturas</b>
            <label for="IdDWES">Desarrollo Web Servidor</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWES" value= "DWES">
            <label for="IdDWEC">Desarrollo Web Cliente</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWEC" value= "DWEC">
        </p>

        <p><b>Curso<b>
            <select name="curso" id="idCurso">
                <option value="0">Selecciona una opcion</option>
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
            </select>
        </p>

        <input type="file" name="fichero" id="idFichero">

        <input type="submit" value="Enviar" name="enviar">
    </form>
    </div>
      <!-- Example row of columns -->
    <div class="row">
   