<?
//nos dice si esta o no en la bd el usuario 

//session_start();//para que salgan los errores


//valida.php debe validar
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

if(empty($user)){
    $_SESSION['error'] = 'Debe rellenar el nombre';
   
}elseif(empty($pass)){
    $_SESSION['error'] = 'Debe rellenar la contraseña';
    
}else{
   $usuarioObjeto = UsuarioDAO::valida($user,$pass);
   if($usuarioObjeto!=null){
    $_SESSION['validado']=true;
    $_SESSION['user']=$user;
    $_SESSION['nombre']=$usuarioObjeto->nombre;
    $_SESSION['perfil']=$usuarioObjeto->perfil;
    $_SESSION['vista']=$vistas['home'];
    $_SESSION['controlador']='./controlador/UserController.php';
    //unset($_SESSION['controlador']);
   }
}?>