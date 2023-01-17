<?
//nos dice si esta o no en la bd el usuario 
<?php
session_start();//para que salgan los errores


//valida.php debe validar
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

if(empty($user)){
    $_SESSION['error'] = 'Debe rellenar el nombre';
   
}elseif(empty($pass)){
    $_SESSION['error'] = 'Debe rellenar la contraseña';
    
}else{
    if (validaUser($user,$pass)){
        //si valida el usuario
            if($_SESSION['perfil']== 'ADM01'){
               
            }else{
                
            }
        }else{
            //no valida
            $_SESSION['error'] = 'Usuario o contraseña no existe';
            
        }
}