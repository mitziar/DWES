<?php
require_once '../funcionesCore/funciones.php';
?>

<form action="../controlador/conciertosControlador.php">
    <select name="id" id="">
        <option  value="0">Seleciona grupo</option>
        <?php
            cargarConciertos();
        ?>
    </select>
    <label for="grupo">
        <input type="text" name="grupo" id="grupo">
    </label>Grupo
    <br>
    <label for="fecha">
        <input type="text" name="fecha" id="fecha">
    </label>Fecha
    <br>
    <label for="precio">
        <input type="text" name="precio" id="precio">
    </label>Precio
    <br>
    <label for="lugar">
        <input type="text" name="lugar" id="lugar">
    </label>Lugar
    <br>
    <input type="submit" value="Modificar" name="accion">
</form>