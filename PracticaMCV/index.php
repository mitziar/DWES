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
    }
    if(isset($_REQUEST['miperfil'])){
        $_SESSION['pagina'] = 'editarUser';
        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['vista'] = $vistas['editarUser'];
        require_once $_SESSION['controlador'];
    }elseif(isset($_REQUEST['modificarUsuario'])){
        $_SESSION['controlador'] = $controladores['login'];
        require_once $_SESSION['controlador'];
    }
    if(isset($_REQUEST['ver'])|| isset($_REQUEST['comprar'])){
        $_SESSION['pagina'] = 'verProducto';
        $_SESSION['controlador'] = $controladores['producto'];
        $_SESSION['vista'] = $vistas['verProducto'];
        require_once $_SESSION['controlador'];
    }
    if(isset($_REQUEST['home'])||!isset($_SESSION['vista'])){
        $_SESSION['pagina'] = 'home';
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['vista'] = $vistas['home'];
        require_once $_SESSION['controlador'];
    }
    if(isset($_REQUEST['verVenta'])){
        $_SESSION['pagina'] = 'venta';
        $_SESSION['controlador'] = $controladores['venta'];
        $_SESSION['vista'] = $vistas['verVenta'];
        require_once $_SESSION['controlador'];
    }elseif(isset($_REQUEST['eliminarVenta'])){
        $_SESSION['controlador'] = $controladores['venta'];
        require_once $_SESSION['controlador'];
    }elseif(isset($_REQUEST['modificarVenta'])){
        $_SESSION['pagina'] = 'modificarVenta';
        $_SESSION['controlador'] = $controladores['venta'];    
        $_SESSION['vista'] = $vistas['modificarVenta'];
        require_once $_SESSION['controlador'];
    }elseif(isset($_REQUEST['modificarDatosVenta'])){
        require_once $_SESSION['controlador'];
    } 
}

require_once('./view/layout.php');

?>