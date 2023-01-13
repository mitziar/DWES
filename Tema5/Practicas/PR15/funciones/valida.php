<?php
session_start();//para que salgan los errores
require("./bd.php");

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

if(empty($user)||empty($pass)){
    $_SESSION['error'] = 'Debe introducir todos los campos';
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