<?php
echo "<header>";
include('../../../header.html');
echo "<h3><center>Ejercicio ej1.php</center></h3>";
echo "</header>";
echo "<hr>";

echo "<nav>";
echo "<h3><a href='../../../Tema2'>/Tema 2</a><a href='../../Practicas'>/Practicas</a><a href='../P03/'>/Práctica 03</a>/ej1.php<br>";
echo "</nav>";

echo "<main>";
echo "<pre>";
/**
 * Muestra el nombre del fichero que se está ejecutando. 
 */
echo "El nombre del archivo que se está ejecutando es: <strong><em>".$_SERVER['PHP_SELF']."</em></strong><br>";

/**
 * Muestra la dirección IP del equipo desde el que estás accediendo
 */
echo "El nombre de la IP del equipo desde el que accedo es: <strong><em>".$_SERVER['REMOTE_ADDR']."</em></strong><br>";

/**
 * Muestra el path donde se encuentra el fichero que se está ejecutando. 
 */
echo "Path donde se encuentra el fichero que se está ejecutando: <strong><em>".$_SERVER['SCRIPT_FILENAME']."</em></strong><br>";

/**
 * Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18. 
 */
date_default_timezone_set("Europe/Madrid");
echo "Fecha y hora actual formateada: <strong><em>".date("Y-m-d H:i:s")."</em></strong><br>";

/**
 * Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de
 * mes de año, hh:mm:ss , Zona horaria). 
 */
date_default_timezone_set("Europe/Lisbon");
echo "La fecha y hora actual en Oporto formateada (día de la semana, día de mes de año, hh:mm:ss , Zona horaria): ";
echo "<strong><em>".date("d m Y H:i:s").".</em></strong> "; 
echo "Zona horaria: <strong><em>".date_default_timezone_get()."</em></strong><br>";

/**
 * Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy
 * de tu cumpleaños
 */

echo "Variable en timestamp fecha de mi cumpleaños(dd/mm/yyyy) <strong><em>".date("d/m/Y",strtotime("21 July 1988"))."</em></strong><br>";

/**
 * Calcular la fecha y el día de la semana de dentro de 60 días. 
 */
setlocale(LC_TIME, "es_ES");
$fecha60=strtotime("+ 60 days");
echo "Fecha y dia dentro de 60 días: <strong><em>".date("D, d m Y",$fecha60)."</strong></em><br>";

echo "<a href=ej5.php?fichero=ej1.php>Ver código</a>";

echo "</pre>";
echo "</main>";
echo "<hr>";
echo "<footer>";
include('../../../footer.html');
echo "</footer>";
?>