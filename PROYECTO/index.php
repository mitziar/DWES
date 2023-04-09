<?php
 session_start();
 require './configuracion/configuracion.php';
if (isset($_REQUEST['logout'])) {

    session_destroy();
    header('Location: ./index.php');
    exit;

}  else {
    if (isset($_REQUEST['registrar'])) {

        $_SESSION['controlador'] = $controladores['registrar'];
        $_SESSION['vista'] = $vistas['registrar'];
        require_once $_SESSION['controlador'];

    } elseif (isset($_REQUEST['registrarse'])) {
    
        $_SESSION['controlador'] = $controladores['registrar'];
        $_SESSION['vista'] = $vistas['registrar'];
        require_once $_SESSION['controlador'];

    } elseif (isset($_REQUEST['modifica'])) {
    
        $_SESSION['controlador'] = $controladores['perfil'];
        $_SESSION['vista'] = $vistas['perfil'];
        require_once $_SESSION['controlador'];

    } elseif (isset($_REQUEST['miperfil'])) {
    
        $_SESSION['controlador'] = $controladores['perfil'];
        $_SESSION['vista'] = $vistas['perfil'];
        require_once $_SESSION['controlador'];

    } elseif (isset($_REQUEST['home']) && estaValidado()) {
    
        $_SESSION['controlador'] = $controladores['equipos'];
        $_SESSION['vista'] = $vistas['equipos'];
        require_once $_SESSION['controlador'];
        

    }elseif (isset($_REQUEST['nuevoEquipo'])) {
    
        $_SESSION['controlador'] = $controladores['equipos'];
        $_SESSION['vista'] = $vistas['equipoNuevo'];
        require_once $_SESSION['controlador'];
        
    }elseif (isset($_REQUEST['insertarEquipo'])) {
    
            $_SESSION['controlador'] = $controladores['equipos'];
            //$_SESSION['vista'] = $vistas['equipoNuevo'];
            require_once $_SESSION['controlador'];
    } else {
     
        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['vista'] = $vistas['login'];
        require_once $_SESSION['controlador'];

    }
}

require_once('./webroot/vista/layout.php');
