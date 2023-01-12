<?php
require_once('Persona.php');

$p1= new Persona(1,'maria',21,'maria@gmail.com');
//var_dump($p1);
$p1->setNombre('Pepe');//si hago $p1.nombre: me da error porque es privado

echo $p1;

//$p2= clone $p1;
//echo $p2;

$p2=$p1;//DOS VARIABLES QUE APUNTAN AL MISMO OBJETO
$p1->setEdad(22);
echo $p2;

//diferenciar mismos valores a mismo objeto

if($p1==$p2){
    echo "tienen los mismos valores";
}

if($p1===$p2){
   echo "Es el mismo"; 
}

?>