<?
require_once('./Alumno.php');
require_once('./Abstracta');
require_once('./AbstractaH1');
require_once('./AbstractaH2');

$a= new Alumno("mari",20,"email.com","DAS");
echo $a;
$a->darBaja();
echo $a;

$nueva=new AbstractaH2;
$nueva->muestra();
$nueva->soy();
$nueva->soy2();