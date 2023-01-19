<?
if(isset($_REQUEST['miperfil'])){

    //el usuario 
    $_SESSION['accion']='ver'
    $accion = 'ver';
    $usuario = UsuarioDAO::findById($_SESSION['usuario']);
    $_SESSION['vista'] = $vistas['user'];
}elseif(isset($_REQUEST['editar'])){

    $_SESSION['accion']='editar';
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    $_SESSION['vista'] = $vistas['user'];
}elseif(isset($_REQUEST['guardar'])){
        //funcion que valide la contraseña
    $_SESSION['accion']='ver';
    $usuario = UsuarioDAO::$findById($_SESSION['usuario']);
    $usuario->nombre = $_REQUEST['nombre'];
    $usuario->correo = $_REQUEST['email'];
    $usuario->clave = $_REQUEST['pass'];
    $usuario->perfil = $_REQUEST['perfil'];
    if(UsuarioDAO::update($usuario)){
        $_SESSION['accion']='editar'
        $_SESSION['error']='No se ha podido modificar';
    }
}else{
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    $_SESSION['vista']= $vistas['user'];
}