<?php
if(isset($_REQUEST['enviar'])){
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
                $_SESSION['user'] = $usuario->id;
                $_SESSION['nombre'] = $usuario->usuario;
                $_SESSION['perfil'] = $usuario->perfil;
                if (isset($_REQUEST['recuerdame'])){
                    setcookie('usuario',serialize($usuario));//string
                }else{
                    setcookie('usuario','',-1);
                }
                if(esAdmin()){
                    $_SESSION['vista'] = $vistas['verApuestas'];
                    $_SESSION['controlador'] = $controladores['verApuestas'];
                    $_SESSION['pagina'] = 'verApuestas'; 
                }else{
                    $_SESSION['controlador'] = $controladores['apuesta'];  
                }
                
                    
                
                require  $_SESSION['controlador'];

            }elseif($usuario == null){
                $_SESSION['error']='Usuario o contraseña inválidos';
            }
        }
    }
}
?>