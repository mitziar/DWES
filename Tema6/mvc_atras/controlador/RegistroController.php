<?

if (isset($_REQUEST['guardar'])) {
    //validamos el formulario este bien
    //$_SESSION['error'] el motivo de que no valida
    $user = new Usuario($_REQUEST['user'],sha1($_REQUEST['pass']), $_REQUEST['nombre'], $_REQUEST['email'], 'P0001');
    if (UsuarioDAO::insert($user)) {
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['vista'] = $vistas['home'];
        $_SESSION['validado'] = true;
        $_SESSION['user'] = $user->usuario;
        $_SESSION['nombre'] = $user->nombre;
        $_SESSION['perfil'] = $user->perfil;
    }else{
        $_SESSION['error'] = 'No se ha podido registrar';
    }
    require_once $_SESSION['controlador'] ;
}
