<?php
session_start();//para que salgan los errores
require("./bd.php");
//añdiriamos funciones.php donde estaria la validación del formulario


    
    // if(empty($_REQUEST['pass'])){
    //     echo "No ha introducido contraseña<br>";
    // }
    // if(isset($_REQUEST['user']) && isset($_REQUEST['pass'])){
    //     header("Location")
    // }



//valida.php debe validar
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
            if($_SESSION['perfil']== 'ADM01'){
                header('Location: ../paginas/admin.php');
                exit();
            }else{
                header('Location: ../paginas/index.php');
                exit();
            }
        }else{
            //no valida
            $_SESSION['error'] = 'Usuario o contraseña no existe';
            header('Location: ../login.php');
                exit();
        }
}
