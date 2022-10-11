<?php
/**
 * Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre
 * el día de la semana de dicho día. (Por defecto, dale el valor de 12/09/2022)
 */
echo "<header>";
include('../../../header.html');
echo "<h3><center>Ejercicio ej3.php</center></h3>";
echo "</header>";
echo "<hr>";

echo "<nav>";
echo "<h3><a href='../../../Tema2'>/Tema 2</a><a href='../../Practicas'>/Practicas</a><a href='../P03/'>/Práctica 03</a>/ej3.php<br>";
echo "</nav>";

echo "<main>";
$defecto= strtotime("09/1/2022");

$fecha= date("D, d/m/Y",strtotime($_GET["ano"].'/'.$_GET["mes"].'/'.$_GET["dia"],$defecto));
echo "La fecha recibida es ".$fecha;
echo "<br><a href=ej5.php?fichero=ej3.php>Ver código</a>";
echo "</main>";
echo "<hr>";
echo "<footer>";
include('../../../footer.html');
echo "</footer>";
?>