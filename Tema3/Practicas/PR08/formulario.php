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
        <h2><center>Formulario</center></h2>
      </div>
    </div>

    <div class="container">
    <div class="row">
            <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a>/PR08/Formulario plantilla</h4>
    </div>
    
        <?php
        if(validado()){
            echo "<h3>Datos del formulario</h3><hr>";
            foreach($_REQUEST as $key => $value){
                if($key=='checkboxElige'){
                    foreach($value as $valor){
                        echo "<label>".$value.": </label>".$valor."<br>";
                    }
                }else{
                    echo "<label>".$key.": </label>".$value."<br>";
                }
            }
            
        }else{?>
            
                    <h3>Formulario plantilla</h3><hr>
        <form action="formulario.php" method="post" enctype="multipart/form-data">
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
                    <span>Debe introducir nombre</span>
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
                    <span>Debe introducir alfanumerico</span>
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
                <span>Debe introducir fecha</span>
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
                    <?php
                    if(enviado() && !existe("radioObligatorio")  ){
                        echo "<span>Seleccione un radio<span>";
                    }
                    ?>
            </p>
            <p>
                <label for="eligeOpcion">Elige una opción:</label>
                <select name="eligeOpcion" id="idEligeOpcion">
                    <option value="0">Seleccione</option>
                    <option value="1" <?php
                        if(existe('eligeOpcion') && enviado() && $_REQUEST['eligeOpcion']==1){
                            echo " selected";
                        }?>>Primero</option>
                    <option value="2"<?php
                        if(existe('eligeOpcion') && enviado() && $_REQUEST['eligeOpcion']==2){
                            echo " selected";
                        }?>>Segundo</option>
                </select>
                    <?php
                        if((existe('eligeOpcion') && enviado() && $_REQUEST['eligeOpcion']==0) || (!existe('eligeOpcion') && enviado()) ){
                            echo "<span>Seleccione una opcion<span>";
                        }
                    ?>
            </p>
            <br>
            <p>
                <label for="checkboxElige">Elige al menos 1 y máximo 3: </label>
                <input type="checkbox" name="checkboxElige[]" id="idCheckbox1" value="checkbox1"<?php
                if(enviado()&&existe('checkboxElige')){
                    foreach ($_REQUEST['checkboxElige'] as $key) {
                        if($key=='checkbox1')
                            echo "checked";
                    }
                }
                ?>><label for="idCheckbox1">Check1</label>
                <input type="checkbox" name="checkboxElige[]" id="idCheckbox2"value="checkbox2"<?php
                if(enviado()&&existe('checkboxElige')){
                    foreach ($_REQUEST['checkboxElige'] as $key) {
                        if($key=='checkbox2')
                            echo "checked";
                    }
                }
                ?>><label for="idCheckbox2">Check2</label>
                <input type="checkbox" name="checkboxElige[]" id="idCheckbox3"value="checkbox3"<?php
                if(enviado()&&existe('checkboxElige')){
                    foreach ($_REQUEST['checkboxElige'] as $key) {
                        if($key=='checkbox3')
                            echo "checked";
                    }
                }
                ?>><label for="idCheckbox3">Check3</label>
                <input type="checkbox" name="checkboxElige[]" id="idCheckbox4"value="checkbox4"<?php
                if(enviado()&&existe('checkboxElige')){
                    foreach ($_REQUEST['checkboxElige'] as $key) {
                        if($key=='checkbox4')
                            echo "checked";
                    }
                }
                ?>><label for="idCheckbox4">Check4</label>
                <input type="checkbox" name="checkboxElige[]" id="idCheckbox5"value="checkbox5"<?php
                if(enviado()&&existe('checkboxElige')){
                    foreach ($_REQUEST['checkboxElige'] as $key) {
                        if($key=='checkbox5')
                            echo "checked";
                    }
                }
                ?>><label for="idCheckbox5">Check5</label>
                <input type="checkbox" name="checkboxElige[]" id="idCheckbox6"value="checkbox6"<?php
                if(enviado()&&existe('checkboxElige')){
                    foreach ($_REQUEST['checkboxElige'] as $key) {
                        if($key=='checkbox6')
                            echo "checked";
                    }
                }
                ?>><label for="idCheckbox6">Check6</label>
                <?php
                if(enviado()&&(!existe('checkboxElige') || (count($_REQUEST['checkboxElige'])<1 || count($_REQUEST['checkboxElige'])>3))){
                    echo '<span>Seleccione opcion: Mínimo 1 y máximo 3</span>';
                }
                ?>
            </p>
            <p>
                <label for="idNumeroTelefono">Nº Teléfono</label>
                <input type="text" name="numeroTelefono" id="idNumeroTelefono" value=<?php
                if(enviado() && existe('numeroTelefono') && is_numeric($_REQUEST['numeroTelefono'])==true){
                    echo $_REQUEST['numeroTelefono'];}
                ?>><?php
                if(enviado() && vacio('numeroTelefono')){

                    echo "<span>Introduce telefono<span>";
                }elseif(enviado() && existe('numeroTelefono') && is_numeric($_REQUEST['numeroTelefono'])==false){

                    echo "<span> Introduce números para el telefono<span>";
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
    <?php
    }
    ?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
</body>
</html>