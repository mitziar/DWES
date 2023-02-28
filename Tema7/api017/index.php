<?
require_once './controlador/ControladorPadre.php';
require_once './controlador/EquipoControlador.php';
require_once './controlador/JugadorControlador.php';

require_once './modelo/Equipo.php';
require_once './modelo/Jugador.php';

require_once './dao/EquipoDAO.php';
require_once './dao/JugadorDAO.php';


$recurso = ControladorPadre::recurso();

if($recurso){
    if($recurso[1] == 'equipo'){
        $controlador = new EquipoControlador();
        $controlador -> controlar();
    }elseif($recurso[1] == 'jugador'){
        $controlador = new JugadorControlador();
        $controlador -> controlar();
    }
}