<?php
if (isset($_REQUEST['modifica']) && !camposVacios() && $_REQUEST['password'] == $_REQUEST['password2']) {

    if (modificarUsuario()) {
        $_SESSION['acierto'] = 'Se han guardado los cambios.';
        $_SESSION['user'] = $_REQUEST['user'];
        $_SESSION['controlador'] = $controladores['equipos'];
        $_SESSION['vista'] = $vistas['equipos'];
        require_once $_SESSION['controlador'];
    }
} elseif (isset($_REQUEST['modifica'])) {
    if (camposVacios()) {
        $_SESSION['error'] = 'Existen campos vacios';
    } elseif ($_REQUEST['password'] != $_REQUEST['password2']) {
        $_SESSION['error'] = 'Las contraseñas no coinciden';
    }
}
