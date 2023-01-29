<?php
    if(isset($_REQUEST['verVenta'])){
        //no viene de comprar

    }else{

        //viene de comprar
        if(isset($_REQUEST['stock'])&&isset($_REQUEST['codigoProducto'])&&isset($_REQUEST['unidades'])){
            $stock = $_REQUEST['stock'] - $_REQUEST['unidades'];
            if(VentaDao::transacionVenta( $_REQUEST['codigoProducto'], $stock)) {
                $_SESSION['pagina'] = 'venta';
                $_SESSION['controlador'] = $controladores['venta'];
                $_SESSION['vista'] = $vistas['verVenta'];
                require_once $_SESSION['controlador'];
            }else{
                $_SESSION['error']='No se ha podido ejecutar la venta';
            }
        } else{
             $_SESSION['vista'] = $vistas['verVenta'];
             $_SESSION['pagina'] = 'venta';
        }

        
    }
    

?>