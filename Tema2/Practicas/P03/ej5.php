<?php
/**
 * Crea un enlace a una página en cada página anterior que muestre el contenido del fichero
 * que se está ejecutando.
 *  */
echo "<header>";
include('../../../header.html');
echo "<h3><center>Ejercicio ej5.php</center></h3>";
echo "</header>";
echo "<hr>";

echo "<nav>";
echo "<h3><a href='../../../Tema2'>/Tema 2</a><a href='../../Practicas'>/Practicas</a><a href='../P03/'>/Práctica 03</a>/ej5.php<br>";
echo "</nav>";

echo "<main>";
echo "<h1>".$_GET['fichero']."</h1>";
echo highlight_file($_GET['fichero']);
echo "</main>";
echo "<hr>";
echo "<footer>";
include('../../../footer.html');
echo "</footer>";
?>