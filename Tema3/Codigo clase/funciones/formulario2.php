<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="./recibe2.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre"></input>
        </p>
        <p>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="idPass"></input>
        </p>
        <p>
            <label for="genero">Género</label>
            <input type="radio" name="genero" id="idGenero" value="Masculino">Masculino</input>
            <input type="radio" name="genero" id="idGenero" value="Femenino">Femenino</input>
        </p>
        <p>
            <label>Asignaturas</label>
            <label for="IdDWES">Desarrollo Web Servidor</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWES" value= "DWES">
            <label for="IdDWEC">Desarrollo Web Cliente</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWEC" value= "DWEC">
        </p>
        <p>
            <label for="curso">Curso</label>
            <select name="curso">
                <option value="0">Seleccione curso</option>
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
            </select>
        </p>
        <p>

            <label>Foto</label>
            <input type="file" name="fichero">
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>
</body>
</html>