<?php
require("./bd.php");
//añdiriamos funciones.php donde estaria la validación del formulario



//valida.php debe validar
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

if (validaUser($user,$pass)){
//si valida el usuario
    if($_SESSION['perfil']== 'ADM01'){
        header('Location:../paginas/admin.php');
        exit();
    }
}else{
    //no valida
    header('Location:../paginas/login.php');
        exit();
}