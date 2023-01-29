<?php
if(isset($_REQUEST['comprar'])){

        if(empty($_REQUEST['unidades'])){
            $_SESSION['error']='Introduzca las unidades que desea comprar';
        }elseif(!estaValidado()){
            $_SESSION['error']='Debe hacer login para comprar';
            $_SESSION['controlador'] = $controladores['login'];
            $_SESSION['codigoProducto']=$_REQUEST['codigoProducto'];
            $_SESSION['vista'] = $vistas['login'];
        }
        else{
            $_SESSION['controlador'] = $controladores['venta'];
            require_once ($_SESSION['controlador']);
        }
    
}


?>