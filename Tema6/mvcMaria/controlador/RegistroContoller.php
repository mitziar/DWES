<?php
if(isset($_REQUEST['guardar'])){
//validamos el formulario este biewn
//$_SSESSIOM['error'] el motivo de que nno valide
    $user = new Usuario( $_REQUEST['user'], $_REQUEST['usuario'],$_REQUEST['email'],$_REQUEST['pass'], $_REQUEST['usuario']);

        if(UsuarioDAO::insert($user)){
            $_SESSION['controlador'] = $controladores['home'];
            $_SESSION['vista'] = $vistas['home'];
            $_SESSION['validado'] = true;
            $_SESSION['user'] = $_REQUEST['user'];//tb user->usuario
                $_SESSION['nombre'] = $user->nombre;
                $_SESSION['perfil'] = $user->perfil;
        }else{
            $_SESSION['error'] = 'No se ha podido registrar';
        }
}