<?php
$p1=new Persona('maria',21,'email');
echo $p1->edad;//puedo acceder si tengo definido __get
echo $p1->__get('edad');
echo $p1->__get('nombre');
echo $p1->__get('email');


$p1->edad=25;
echo $p1->edad;

echo Persona::$id;
//cada vez que crees una persona añade uno al id(un contador de ids)
?>