<SCRIPT LANGUAGE="JavaScript">
history.forward()
</SCRIPT>
<?

require './config/configuracion.php';

session_start();
if (isset($_REQUEST['atras'])) {
    $array = array_pop($_SESSION['atras']);
    $array = array_pop($_SESSION['atras']);
    $_SESSION['controlador'] = $array['controlador'];
    $_SESSION['vista'] = $array['vista'];
    require_once $_SESSION['controlador'];
}elseif (isset($_REQUEST['registro'])) {
    $_SESSION['controlador'] = $controladores['registro'];
    $_SESSION['vista'] = $vistas['registro'];   
} else if (isset($_REQUEST['home'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
} elseif (isset($_REQUEST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
} else {
    //si no tiene una vista home    
    if (!isset($_SESSION['pagina'])) {
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['pagina'] = 'home';
        $_SESSION['vista'] = $vistas['home'];
        require_once $_SESSION['controlador'];
        //si ha pulsado login 
    } elseif (isset($_REQUEST['login'])) {
        $_SESSION['pagina'] = 'login';
        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['vista'] = $vistas['login'];
    } elseif (isset($_SESSION['pagina'])) {
        if (isset($_REQUEST['miperfil'])) {
            $_SESSION['accion'] = 'ver';
            $_SESSION['controlador'] = $controladores['user'];
            $_SESSION['vista'] = $vistas['user'];
            require_once $_SESSION['controlador'];
        } else if (esAdmin() && isset($_REQUEST['admin'])) {
            $_SESSION['controlador'] = $controladores['admin'];
            $_SESSION['pagina'] = 'admin';
            $_SESSION['vista'] = $vistas['admin'];
            require_once $_SESSION['controlador'];
        } else {
            require_once $_SESSION['controlador'];
        }
    }
}

if(!isset($_SESSION['atras'] )){
    $_SESSION['dato'] = $_REQUEST;
    $atras = array($_SESSION);
    $_SESSION['atras'] = $atras;
    
}else{
    $_SESSION['dato'] = $_REQUEST;
    $atras = $_SESSION['atras'];
    array_push($atras,$_SESSION);
    $_SESSION['atras'] = $atras;
}
require_once('./vista/layout.php');
