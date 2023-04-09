<?php
if (isset($_REQUEST['registrarse'])) {

    if (isset($_REQUEST['registrarse']) && camposVacios()) {

        $_SESSION['error'] = 'Introduzca todos los campos.';
        require_once $_SESSION['controlador'];

    } elseif (isset($_REQUEST['registrarse']) && $_REQUEST['password'] != $_REQUEST['password2']) {

        $_SESSION['error'] = 'Las contraseñas deben ser iguales.';
        require_once $_SESSION['controlador'];
    } elseif (isset($_REQUEST['registrarse']) && existeUsuario($_REQUEST['email'])) {

        $_SESSION['error'] = 'Ya existe un usuario con ese email.';
        require_once $_SESSION['controlador'];

    } elseif (
        isset($_REQUEST['registrarse']) &&
        !camposVacios() &&
        $_REQUEST['password'] == $_REQUEST['password2'] &&
        !existeUsuario($_REQUEST['email'])
    ) {
        if(insertarUsuario()){
            $_SESSION['validado'] = true;
            $_SESSION['user'] =  $_REQUEST['user'];
            $_SESSION['perfil'] = 2;
            $_SESSION['controlador'] = $controladores['equipos'];
            $_SESSION['vista'] = $vistas['equipos'];
            $_SESSION['usuario'] = getUsuario($_REQUEST['email']);
            require_once $_SESSION['controlador'];
        }else{
            $_SESSION['error'] = 'Error al guardar el nuevo usuario';
        }
    }
}
