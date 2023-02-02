<?php
     if(isset($_REQUEST['eliminarVenta'])&&isset($_REQUEST['codigoVenta'])){
        if(!VentaDao::delete($_REQUEST['codigoVenta'])){
            $_SESSION['error']='No se ha podido eliminar la venta';
        }
     }elseif(isset($_REQUEST['modificarDatosVenta'])){
        if( isset($_REQUEST['codigoVenta']) && isset($_REQUEST['fecha'])&& isset($_REQUEST['cantidad']) && isset($_REQUEST['precio']) && isset($_REQUEST['codigoProducto']) && isset($_REQUEST['usuario'])){
            $venta=new Venta($_REQUEST['codigoVenta'],$_REQUEST['fecha'],$_REQUEST['cantidad'],$_REQUEST['precio'],$_REQUEST['codigoProducto'],$_REQUEST['usuario']);
            if(VentaDao::update($venta)){
                $_SESSION['pagina'] = 'venta';
                $_SESSION['controlador'] = $controladores['venta'];
                $_SESSION['vista'] = $vistas['verVenta'];
                require_once $_SESSION['controlador'];
            }else{
                $_SESSION['error']='No se ha podido modificar la venta';
            }
        }
    }elseif(isset($_REQUEST['comprarProducto'])){
        if(isset($_REQUEST['stock'])&&isset($_REQUEST['codigoProducto'])&&isset($_REQUEST['unidades'])){
     
            $stock = $_REQUEST['stock'] - $_REQUEST['unidades'];
            if(VentaDao::transacionVenta( $_REQUEST['codigoProducto'], $stock, $_REQUEST['unidades'],$_REQUEST['precio'])) {
                $_SESSION['pagina'] = 'venta';
                $_SESSION['controlador'] = $controladores['venta'];
                $_SESSION['vista'] = $vistas['verVenta'];
                require_once $_SESSION['controlador'];
            }else{
                $_SESSION['error']='No se ha podido ejecutar la venta';
            }
        //   $_SESSION['vista'] = $vistas['verVenta'];
        //   $_SESSION['pagina'] = 'venta';  
    }
    }
        
             
?>