<?php
session_start();//para que salgan los errores
require("./bd.php");

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

if(empty($user)){
    $_SESSION['error'] = 'Debe rellenar el nombre';
    header('Location: ../login.php');
    exit();
}elseif(empty($pass)){
    $_SESSION['error'] = 'Debe rellenar la contraseña';
    header('Location: ../login.php');
    exit();
}else{
    if (validaUser($user,$pass)){
        //si valida el usuario
            if(isset($_SESSION['perfil'])){

                if(!empty($_REQUEST['codigo'])){
                     header('Location: ../paginas/comprarProducto.php?codigo='.$_REQUEST['codigo']);
                     exit();
                }else{
                    header('Location: ../index.php');
                    exit();
                }
            }
        }else{
            //no valida
            $_SESSION['error'] = 'Usuario o contraseña no existe';
            header('Location: ../login.php');
            exit();
        }
}
