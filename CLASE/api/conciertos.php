<?
require_once './controlador/ControladorPadre.php';
require_once './controlador/ConciertosControlador.php';
require_once './modelo/Concierto.php';
require_once './dao/ConciertoDAO.php';

$recurso = ControladorPadre::recurso();
if($recurso){
    if($recurso[1] == 'conciertos'){
        $controlador = new ConciertosControlador();
        $controlador->controlar();
    }
}