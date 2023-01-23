<?

if(isset($_REQUEST['admProductos'])){
    
    $_SESSION['vista'] = $vistas['listaProd'];
    //quiero que me controle xq voy a hacer cosas con producto
    $_SESSION['controlador']=$controladores['producto'];
    require_once $_SESSION['controlador'];
}
