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
<link rel="stylesheet" href="">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <title>DWES-Itziar</title>


  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Formulario</center></h2>
      </div>
    </div>

    <div class="container">
    <div class="row">
            <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a>/PR08/Formulario plantilla</h4>
    </div>
        <h3>Formulario plantilla</h3><hr>
      <form action="formulario.php" method="post">
        <p>
            <!-- Pongo el for = que el id para que cuando selecione el label el input tome el foco-->
            <label for="idAlfabetico">Alfabético</label>
            <input type="text" name="alfabetico" id="idAlfabetico" value="<?php
            if (!vacio('alfabetico') && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                    echo $_REQUEST['alfabetico'];//el value es
                }
            ?>">
            <?php
            if (vacio('alfabetico') && enviado())
            {//si el nombre está vacio y el formulario ha sido enviado                 
            ?>
            <label>Debe introducir nombre</label>
            <?php
             }
        ?>

        </p>
        <p>
            <label for="idAlfabeticoOpcional">Alfabético Opcional</label>
            <input type="text" name="alfabeticoOpcional" id="idAlfabeticoOpcional"value="<?php
            if (!vacio('alfabeticoOpcional') && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                    echo $_REQUEST['alfabeticoOpcional'];//el value es
                }
            ?>">
        </p>
        <p>
            <label for="idAlfanumerico">Alfanumérico</label>
            <input type="text" name="alfanumerico" id="idAlfanumerico" value="<?php
            if (!vacio('alfanumerico') && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                    echo $_REQUEST['alfanumerico'];//el value es
                }
            ?>">
            <?php
            if (vacio('alfanumerico') && enviado())
            {//si el nombre está vacio y el formulario ha sido enviado                 
            ?>
            <label>Debe introducir alfanumerico</label>
            <?php
             }
        ?>
        </p>
        <p>
            <label for="idAlfanumericoOpcional">Alfanumérico Opcional</label>
            <input type="text" name="alfanumericoOpcional" id="idAlfanumericoOpcional" value="<?php
            if (!vacio('alfanumericoOpcional') && enviado()){//si el nombre no está vacio y el formulario ha sido enviado         
                    echo $_REQUEST['alfanumericoOpcional'];//el value es
                }
            ?>">
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
            <label>Debe introducir fecha</label>
            <?php
             }
        ?>
        </p>
        <p>
            <label for="idFechaOpcional">Fecha Opcional</label>
            <input type="date" name="fechaOpcional" id="idFechaOpcional" value="<?php
            if(!vacio('fechaOpcional')&&enviado())
                echo $_REQUEST['fechaOpcional'];
            ?>">
        </p>
        <p>
            <label for="radioObligatorio">Radio Obligatorio: </label>
            <input type="radio" name="radioObligatorio" id="idRadio1" value="opcion1" <?php
                if(enviado() && existe("radioObligatorio") && $_REQUEST["radioObligatorio"]=="opcion1"){
                    echo "checked";
                }
            ?>><label for="idRadio1">Opcion1</label>

            <input type="radio" name="radioObligatorio" id="idRadio2" value="opcion2"<?php
                if(enviado() && existe("radioObligatorio") && $_REQUEST["radioObligatorio"]=="opcion2"){
                    echo "checked";
                }
            ?>><label for="idRadio2">Opcion2</label>
            <input type="radio" name="radioObligatorio" id="idRadio3" value="opcion3"<?php
                if(enviado() && existe("radioObligatorio") && $_REQUEST["radioObligatorio"]=="opcion3"){
                    echo "checked";
                }
            ?>><label for="idRadio3">Opcion3</label>

        </p>
        <p>
            <label for="eligeOpcion">Elige una opción:</label>
            <select name="eligeOpcion" id="idEligeOpcion">
                <option value="0">Seleccione</option>
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
            </select>
        </p>
        <br>
        <p>
            <label for="checkboxElige">Elige al menos 1 y máximo 3</label>
            <input type="checkbox" name="checkboxElige" id="idCheckbox1"><label for="idCheckbox1">Check1</label></input>
            <input type="checkbox" name="checkboxElige" id="idCheckbox2"><label for="idCheckbox2">Check2</label></input>
            <input type="checkbox" name="checkboxElige" id="idCheckbox3"><label for="idCheckbox3">Check3</label></input>
            <input type="checkbox" name="checkboxElige" id="idCheckbox4"><label for="idCheckbox4">Check4</label></input>
            <input type="checkbox" name="checkboxElige" id="idCheckbox5"><label for="idCheckbox5">Check5</label></input>
            <input type="checkbox" name="checkboxElige" id="idCheckbox6"><label for="idCheckbox6">Check6</label></input>
        </p>
        <p>
            <label for="idNumeroTelefono">Nº Teléfono</label>
            <input type="number" name="numeroTelefono" id="idNumeroTelefono">
        </p>
        <p>
            <label for="idEmaill">Email</label>
            <input type="text" name="email" id="idEmail" placeholder="alguien@email.com">
        </p>
        <p>
            <label for="idPass">Contraseña</label>
            <input type="password" name="pass" id="idPass">
        </p>
        <p>
            <label for="idDocumento">Subir documento</label>
            <input type="file" name="docuemnto" id="idDocumento">
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