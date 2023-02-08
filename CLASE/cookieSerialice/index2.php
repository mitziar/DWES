<?php
require_once('./Persona2.php');
$p1=new Persona2('maria',21,'email');
echo $p1->edad;//puedo acceder si tengo definido __get
echo $p1->__get('edad');
echo $p1->__get('nombre');
echo $p1->__get('email');


$p1->edad=25;
echo $p1->edad;

echo Persona2::$id;
echo Persona2::elProximoId();

echo "<br>Propiedades que existen: ";
echo "<br>En la clase ";
print_r(get_class_vars('Persona2'));
//cada vez que crees una persona añade uno al id(un contador de ids)
echo "<br>Propiedades que existen: ";
echo "<br>En el objeto ";
print_r(get_object_vars($p1));


print_r($p1->verVariables());
echo $p1->nombre;


echo "<br>";
setcookie('objeto',serialize($p1));//string

//var_dump(unserialize($_COOKIE['objeto']));//objeto


?>
<a href="./serializa.php?objeto=O%3A8%3A%22Persona2%22%3A3%3A%7Bs%3A16%3A%22%00Persona2%00nombre%22%3Bs%3A5%3A%22maria%22%3Bs%3A14%3A%22%00Persona2%00edad%22%3Bi%3A25%3Bs%3A15%3A%22%00Persona2%00email%22%3Bs%3A5%3A%22email%22%3B%7D"<?echo serialize($p1)?>>Enviar</a>