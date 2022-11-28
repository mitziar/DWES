<?php
require './seguro/conexion.php';
/**CON mysqli
 * suelen ser datos dinámicos: variará base datos, usuario, etc.
 * Lo normal esque no esten accesibles desde el exterior, un sitio seguro y encriptado
 */

$conexion = mysqli_connect(HOST,USER,PASS);

echo "";

?>