<?php
if(isset($_REQUEST['comprar'])){
    if(empty($_REQUEST['unidades'])){
        $_SESSION['error']='Introduzca las unidades que desea comprar';
        require_once $_SESSION['vista'];
    }elseif(!estaValidado()){
        $_SESSION['error']='Debe hacer login para comprar';
        require_once $_SESSION['vista'];
       }
    else{
        //venta
        $venta = new Venta();
        //mostrarVentas por usuario
    }
}


?>