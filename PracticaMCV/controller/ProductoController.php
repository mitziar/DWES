<?php
if(isset($_REQUEST['comprarProducto'])){

        if(empty($_REQUEST['unidades'])){
            $_SESSION['error'] = 'Introduzca las unidades que desea comprar';
            require_once $_SESSION['controlador'];

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
if(isset($_REQUEST['eliminarProducto']) && !empty($_REQUEST['codigoProducto'])){
    if(ProductoDAO::delete($_REQUEST['codigoProducto'])){
        require_once $_SESSION['controlador'];
    }else{
        $_SESSION['error'] = 'El producto no se puede eliminar. Está referenciado en otra tabla';
    }
}elseif(isset($_REQUEST['modificarProducto'])&&!camposVacios()){
    $producto=new Producto($_REQUEST['codigoProducto'],$_REQUEST['nombreProducto'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['unidades'],$_REQUEST['imagen'],1);
    if($producto){
        if(ProductoDAO::update($producto)){
            $_SESSION['pagina'] = 'home';
            $_SESSION['controlador'] = $controladores['home'];
            $_SESSION['vista'] = $vistas['home'];
            require_once $_SESSION['controlador'];
            //albaran
        }else{
            $_SESSION['error']='No se ha actualizado';
            require_once $_SESSION['controlador'];
        }
    }
}
if(isset($_REQUEST['insertarProducto'])&& !empty($_REQUEST['nombreProducto'])&&!empty($_REQUEST['descripcion'])&&!empty($_REQUEST['precio'])&&!empty($_REQUEST['unidades'])&&!empty($_FILES['file'])){
    if(esAdmin()||esModerador()){
            $rutaGuardado = "./webroot/uploads/";
            $rutaConNombreFichero = $rutaGuardado .  $_FILES['file']['name'];

            if(!move_uploaded_file( $_FILES['file']['tmp_name'],$rutaConNombreFichero))
            {
                $_SESSION['errores']='No se ha guardado la imagen';
            }else{
                $producto=new Producto(null,$_REQUEST['nombreProducto'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['unidades'],$_FILES['file']['name'],1);
                if($producto){
                    if(ProductoDAO::insert($producto)){
                        $_SESSION['error']='Nuevo producto añadido';
                        $_SESSION['pagina'] = 'administrarAlbaranes';
                        $_SESSION['controlador'] = $controladores['albaran'];
                        $_SESSION['vista'] = $vistas['administrarAlbaranes'];
                        require_once $_SESSION['controlador'];
                    }else{
                        $_SESSION['error']='No se ha podido insertar';
                        require_once $_SESSION['controlador'];
                    }
                }
            }

    }else{
        $_SESSION['error']='No tiene permisos para introducir productos';
    }
}


?>