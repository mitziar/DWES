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
    
    <input type="submit" value="Borrar" name="accion">
</form>