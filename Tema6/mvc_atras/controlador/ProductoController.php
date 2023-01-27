<?

if (isset($_REQUEST['borrar'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::delete($_SESSION['producto']);
    $lista = ProductoDAO::findAll();
}else if (isset($_REQUEST['editar'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas['editarProducto'];
}elseif (isset($_REQUEST['codProd'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas['verProducto'];
}else if(isset($_REQUEST['admProductos'])||isset($array['dato']['admProductos'])){
    $lista = ProductoDAO::findAll();
}if(isset($_SESSION['producto'])){
    $producto = ProductoDAO::findById($_SESSION['producto']);
}
