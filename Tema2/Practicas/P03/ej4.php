<?php
/**. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos
 * personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años. 
 * 
 */
echo "<header>";
include('../../../header.html');
echo "<h3><center>Ejercicio ej4.php</center></h3>";
echo "</header>";
echo "<hr>";

echo "<nav>";
echo "<h3><a href='../../../Tema2'>/Tema 2</a><a href='../../Practicas'>/Practicas</a><a href='../P03/'>/Práctica 03</a>/ej4.php<br>";
echo "</nav>";

echo "<main>";
$persona1=$_GET["persona1"];
$fecha1=new DateTime($_GET["ano"].'-'.$_GET["mes"].'-'.$_GET["dia"]);
$persona2=$_GET["persona2"];
$fecha2=new DateTime($_GET["a"].'-'.$_GET["m"].'-'.$_GET["d"]);


$intervalo=$fecha1->diff($fecha2);// es un objeto

echo $persona1." nació el ".Date("d/m/Y", mktime(0,0,0,$_GET["mes"],$_GET["dia"],$_GET["ano"]))."</br>";
echo $persona2." nació el ".Date("d/m/Y", mktime(0,0,0,$_GET["m"],$_GET["d"],$_GET["a"]))."</br>";


echo "La diferencia de edad es de ".abs($intervalo->y)." año(s)</br>";

echo "<a href=ej5.php?fichero=ej4.php>Ver código</a>";
echo "</main>";
echo "<hr>";
echo "<footer>";
include('../../../footer.html');
echo "</footer>";
?>