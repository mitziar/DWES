<?php
if(isset($_REQUEST['comprar'])){
    if(empty($_REQUEST['unidades'])){
        $_SESSION['error']='Introduzca las unidades que desea comprar';
        header("Location:../index.php?home=home");
    }else{
        //venta
        $venta = new Venta();
        //mostrarVentas por usuario
    }
}

?>