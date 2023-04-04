<?php

require_once './controlador/ControladorPadre.php';
require_once './controlador/ControladorUsuario.php';


require_once './modelo/Usuario.php';


require_once './dao/DAO.php';
require_once './dao/FactoryBD.php';
require_once './dao/UsuarioDao.php';

$recurso = ControladorPadre::recurso();

if ($recurso){

    if ($recurso[1] == 'usuario') {
    
        $controlador = new ControladorUsuario();
        $controlador -> controlar();
    }
    // elseif($recurso[1] == 'actuador'){
    //     $controlador = new ControladorActuador();
    //     $controlador -> controlar();
    // }
}
