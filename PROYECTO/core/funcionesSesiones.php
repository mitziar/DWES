<?php

function estaValidado()
{
    if (isset($_SESSION['validado'])) {
        return true;
    }
    return false;
}

function esAdmin()
{
    if (isset($_SESSION['perfil'])) {
        if ($_SESSION['perfil'] == 1)
            return true;
    }
    return false;
}

function camposVacios()
{
    foreach ($_REQUEST as $key => $value) {
        if (empty($value)) {
            return true;
        }
    }
    return false;
}
function validPassword($pass)
{
    if (strlen($pass) >= 8) {
        $patron = "/[\D|\d][A-Z]{1}[a-z]{1}[0-9]{1}$/";
        if (preg_match($patron, $pass)) {
            return true;
        } else {
            $_SESSION['error'] = 'La contraseña debe acabar en una mayuscula, una minuscula y un número';
        }
    } else {
        $_SESSION['error'] = 'La contraseña debe tener 8 al menos caracteres.';
    }
    return false;
}
function getUsuario($email)
{
    require_once('./peticiones/curl.php');
    $usuario=null;
    $lista = get('http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/usuario?email='.$email);
    $lista = json_decode($lista, true);

    if ($lista != null) {

        return $lista[0];
    }
    return $usuario;
}
function existeUsuario($email)
{
    require_once('./peticiones/curl.php');
    $existe=false;
    $lista = get('http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/usuario?email='.$email);
    $lista = json_decode($lista, true);

    if ($lista != null) {

        foreach ($lista as $key => $value) {

            if ($value['email'] == $email && $value['activo'] == 1) {
               $existe=true;
            }
        }
    }
    return $existe;
}

function insertarUsuario()
{
    require_once('./peticiones/curl.php');
    $json= '{
        "usuario": "'.$_REQUEST['user'].'",
        "clave": "'.hash("sha512", $_REQUEST['password']).'",
        "email": "'.$_REQUEST['email'].'",
        "activo": 1,
        "codigo_rol": 2
        }';
    $resultado = post($json, 'http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/usuario');

    return $resultado;
}
function modificarUsuario()
{
    require_once('./peticiones/curl.php');
    $json= '{
        "codigo_usuario":"'.$_REQUEST['codigo_usuario'].'",
        "usuario": "'.$_REQUEST['user'].'",
        "clave": "'.hash("sha512", $_REQUEST['password']).'",
        "email": "'.$_REQUEST['email'].'",
        "activo": "'.$_REQUEST['activo'].'",
        "codigo_rol":"'.$_REQUEST['codigo_rol'].'"
        }';
    $resultado = put($json, 'http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/usuario');

    return $resultado;
}
