<?php
require_once('./peticiones/curl.php');
if (isset($_REQUEST['entrar'])) {
    if (!empty($_REQUEST['email']) || !empty($_REQUEST['password'])) {
        $user = $_REQUEST['email'];
        $pass = hash("sha512", $_REQUEST['password']);
        if (empty($user)) {
            $_SESSION['error'] = "Debe rellenar el nombre";
        } elseif (empty($pass)) {
            $_SESSION['error'] = "Debe rellenar la contraseña";
        } else {

            $lista = get('http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/usuario');
            $lista = json_decode($lista, true);

            if ($lista != null) {

                foreach ($lista as $key => $value) {

                    if ($value['email'] == $user && $value['clave'] == $pass && $value['activo'] == 1) {
                        $_SESSION['validado'] = true;
                        $_SESSION['user'] =  $value['usuario'];
                        $_SESSION['usuario'] =  $value;
                        $_SESSION['perfil'] = $value['codigo_rol'];
                    }
                }

                if (!estaValidado()) {
                    $_SESSION['error'] = "Usuario o contraseña incorrectos";
                } else {
                    $_SESSION['controlador'] = $controladores['equipos'];
                    $_SESSION['vista'] = $vistas['equipos'];
                    require_once $_SESSION['controlador'];
                }
            }
        }
    } else {
        $_SESSION['error'] = "Existen campos vacios";
    }
}// elseif (isset($_REQUEST['registrar'])) {
//     $_SESSION['controlador'] = $controladores['registrar'];
//     $_SESSION['vista'] = $vistas['registrar'];
//     require_once $_SESSION['controlador'];
// }
