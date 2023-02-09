<?
session_start();
require './config/configuracion.php';

if (isset($_REQUEST['logout'])) {

    session_destroy();
    header('Location: ./index.php');
    exit;
}  else {
    if(isset($_REQUEST['login'])){
        $_SESSION['pagina'] = 'login';
        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['vista'] = $vistas['login'];
        require_once $_SESSION['controlador'];
    }elseif(isset($_REQUEST['enviar'])){
        $_SESSION['controlador'] = $controladores['login'];
        require_once $_SESSION['controlador'];
    }elseif(isset($_REQUEST['insertar'])){
        $_SESSION['controlador'] = $controladores['apuesta'];
        require_once $_SESSION['controlador'];
    }elseif(isset($_REQUEST['modificar'])){
        require_once $_SESSION['controlador'];
    }

   

    if(!isset($_SESSION['vista'])){
        $_SESSION['pagina'] = 'login';
        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['vista'] = $vistas['login'];
        require_once $_SESSION['controlador'];
    }
    if(isset($_REQUEST['generarDatos'])){
        $_SESSION['controlador'] = $controladores['home'];
        require_once $_SESSION['controlador'];
    }
}

require_once('./vista/layout.php');

?>