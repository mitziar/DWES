
<?php
/**
 * Crea una página a la que se le pase por url una variable con el nombre que quieras y
 * muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float.
 */
echo "<header>";
include('../../../header.html');
echo "<h3><center>Ejercicio ej2.php</center></h3>";
echo "</header>";
echo "<hr>";

echo "<nav>";
echo "<h3><a href='../../../Tema2'>/Tema 2</a><a href='../../Practicas'>/Practicas</a><a href='../P03/'>/Práctica 03</a>/ej2.php<br>";
echo "</nav>";

echo "<main>";
$parametro=$_GET["clave"];


echo "El valor de la variable es: <strong><em>".$parametro."</em></strong><br>";

echo "El tipo de la variable es: <strong><em>".gettype($parametro)."</em></strong><br>";

$valor=(int)$parametro;
echo "¿es numérico? :<strong><em>".is_numeric($parametro)."</em></strong><br>";

echo "¿es entero? <strong><em>".is_int($valor)."</em></strong><br>";
$valor=(float)$parametro;
echo "¿es float? <strong><em>".is_float($valor)."</em></strong><br>";
echo "<a href=ej5.php?fichero=ej2.php>Ver código</a>";
echo "</main>";
echo "<hr>";
echo "<footer>";
include('../../../footer.html');
echo "</footer>";
?>