<?
if(isset($_REQUEST['modificarUsuario'])){
    if(!empty($_REQUEST['contraseña'])&&!empty($_REQUEST['email'])&&!empty($_REQUEST['fecha'])&&!empty($_REQUEST['codigo'])&&validPassword($_REQUEST['contraseña'])){
        $usuario= new Usuario($_SESSION['user'],sha1($_REQUEST['contraseña']),$_REQUEST['email'],$_REQUEST['fecha'],$_REQUEST['codigo']);
        if(UsuarioDao::update($usuario)){
                    $_SESSION['vista'] = $vistas['home'];
                    $_SESSION['controlador'] = $controladores['home'];
                    $_SESSION['pagina'] = 'home';  
                    require  $_SESSION['controlador'];
        }else{
            $_SESSION['error']='No se ha podido modificar el usuario';
        }
    }
}else if(isset($_REQUEST['guardarNuevo'])&&!camposVacios()&&validPassword($_REQUEST['contraseña'])&&($_REQUEST['contraseña']==$_REQUEST['contraseña2'])){
        $usuario= new Usuario($_REQUEST['usuario'],sha1($_REQUEST['contraseña']),$_REQUEST['email'],$_REQUEST['fecha'],$_REQUEST['codigo']);
        if(UsuarioDao::insert($usuario)){
                    $_SESSION['validado'] = true;
                    $_SESSION['user'] = $usuario->usuario;
                    $_SESSION['nombre'] = $usuario->usuario;
                    $_SESSION['perfil'] = $usuario->codigo;
                    $_SESSION['vista'] = $vistas['home'];
                    $_SESSION['controlador'] = $controladores['home'];
                    $_SESSION['pagina'] = 'home';  
                    require  $_SESSION['controlador'];
        }else{
            $_SESSION['error']='El usuario ya existe.';
        }
} else if(isset($_REQUEST['registro'])) {
    $_SESSION['controlador'] = $controladores['registro'];
    $_SESSION['vista'] = $vistas['registro'];
} else {
    if (isset($_REQUEST['user'])) {
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        if (empty($user)) {
            $_SESSION['error'] = "Debe rellenar el nombre";
        } elseif (empty($pass)) {
            $_SESSION['error'] = "Debe rellenar la contraseña";
        } else {
            $usuario = UsuarioDao::valida($user, $pass);
            if ($usuario != null) {
                $_SESSION['validado'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['nombre'] = $usuario->usuario;
                $_SESSION['perfil'] = $usuario->codigo;
                if(isset($_SESSION['codigoProducto'])){
                    $_SESSION['pagina'] = 'verProducto';
                    $_SESSION['controlador'] = $controladores['producto'];
                    $_SESSION['vista'] = $vistas['verProducto'];  
                }else{
                    $_SESSION['vista'] = $vistas['home'];
                    $_SESSION['controlador'] = $controladores['home'];
                    $_SESSION['pagina'] = 'home';     
                    
                }
                require  $_SESSION['controlador'];

            }elseif($usuario == null){
                $_SESSION['error']='Usuario o contraseña inválidos';
            }
        }
    }
}