<?php
if(FactoryBD::ejecutarScript()){
    $_SESSION['pagina'] = 'home';
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
}
?>