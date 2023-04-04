<?
// session_start();
// require './configuracion/configuracion.php';
// if (isset($_REQUEST['logout'])) {

//     session_destroy();
//     header('Location: ./index.php');
//     exit;
// }  else {
//     if(isset($_REQUEST['login'])){
//         $_SESSION['pagina'] = 'login';
//         $_SESSION['controlador'] = $controladores['login'];
//         $_SESSION['vista'] = $vistas['login'];
//         require_once $_SESSION['controlador'];
//     }elseif(isset($_REQUEST['enviar'])){
//         $_SESSION['controlador'] = $controladores['login'];
//         require_once $_SESSION['controlador'];
//     }
// }

require_once('./webroot/vista/layout.php');

?>