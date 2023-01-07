<?php
session_start();//para que salgan los errores
include("./bd.php");

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$pass2 = $_REQUEST['pass2'];
$email = $_REQUEST['email'];
$fecha = $_REQUEST['fecha'];


if(empty($user)){
    $_SESSION['error'] = 'Debe rellenar el nombre';
    header('Location: ../paginas/altaUsurio.php');
    exit();
}elseif(empty($pass)){
    $_SESSION['error'] = 'Debe rellenar la contraseña';
    header('Location: ../login.php');
    exit();
}else{
    if (validaUser($user,$pass)){
        //si valida el usuario
            if($_SESSION['perfil']== 1){
                header('Location: ../index.php');
                exit();
            }else{
                header('Location: ../index.php');
                exit();
            }
        }else{
            //no valida
            $_SESSION['error'] = 'Usuario o contraseña no existe';
            header('Location: ../login.php');
                exit();
        }
}