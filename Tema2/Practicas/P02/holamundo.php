<?php
echo "<header>";
include('../../../header.html');
echo "<h3><center>ejercicio holamundo.php</center></h3>";
echo "</header>";
echo "<hr>";

echo "<nav>";
echo "<h4><a href='../../../'>Tema 2</a><a href='../../Practicas'>/Practicas</a><a href='../P02'>/Practica 02</a>/holamundo.php</h4>";
echo "</nav>";

echo "<main>";
$idioma = $_GET["pais"];

$angola = "Olá mundo"; #en angola usan el portugues también
$andorra = "Hola mundo";
$alemania = "Hallo welt";
$albania = "Përshendetje Botë";
$afganistan = "سلام نړی"; #usan el pastún

echo "<h1>".$$idioma."</h1>";
echo "</main>";
echo "<hr>";
echo "<footer>";
include('../../../footer.html');
echo "</footer>";
?>