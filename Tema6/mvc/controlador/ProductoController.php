<?
if(isset($_REQUEST['borrar'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::delete($_SESSION['producto']);
    $lista=ProductoDAO::findAll();
}elseif(isset($_REQUEST['editar'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas['editarProducto'];
}elseif(isset($_REQUEST['codProd'])){//codigo producto llega, sea del ver de usuario o ver de los administradores
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas['verProducto'];
}elseif(isset($_REQUEST['admProductos'])){
    $lista=ProductoDAO::findAll();
}
