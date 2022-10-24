<?php
    require("./validaFormularioFunciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
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

</body>
</html>     