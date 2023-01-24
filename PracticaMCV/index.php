<?
session_start();
require './config/configuracion.php';
if(isset($_REQUEST['login'])){
    $_SESSION['pagina'] = 'login';
    $_SESSION['controlador'] = $controladores['login'];
    $_SESSION['vista'] = $vistas['login'];
    require_once $_SESSION['controlador'];
}elseif(isset($_REQUEST['enviar'])){
    $_SESSION['controlador'] = $controladores['login'];
    require_once $_SESSION['controlador'];
}
if(isset($_REQUEST['comprar'])){
    $_REQUEST['comprar']=null;
    $_SESSION['pagina'] = 'verProducto';
    $_SESSION['controlador'] = $controladores['producto'];
    $_SESSION['vista'] = $vistas['verProducto'];
    require_once $_SESSION['controlador'];
}
if(isset($_REQUEST['home'])){
    $_SESSION['pagina'] = 'home';
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
}
require_once('./view/layout.php');

?>