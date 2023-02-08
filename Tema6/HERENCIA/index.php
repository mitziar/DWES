<?
require_once('./alumno.php');
$a = new Alumno('maria',20,'maria@gmail.com','DAW2');
echo $a;
$a->darBaja();
echo $a;
?>