<?
session_start();
require './config/configuracion.php';
if(isset($_REQUEST['login'])){
    $_SESSION['pagina'] = 'login';
    $_SESSION['controlador'] = $controladores['login'];
    $_SESSION['vista'] = $vistas['login'];
    require_once $_SESSION['controlador'];
}elseif($_REQUEST['enviar']){

}
require_once('./view/layout.php');

?>