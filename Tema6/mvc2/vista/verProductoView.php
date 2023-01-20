<?
if(isset($_REQUEST['ver'])){

$_SESSION['vista'] = $vistas['productoVer'];
$_SESSION['controlador'] = $controladores['producto'];
header("Location: ./index.php");
}else{

}
$arrayProductos=ProductoDao::findAll();