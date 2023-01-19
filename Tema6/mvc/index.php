 <?
 require './config/configuracion.php';
  session_start();

  if(isset($_REQUEST['logout'])){
    session_destroy();//lleva al login
  }
//si no tiene una vista
//guardada en la sesion va a hom
if(estaValidado() && !isset($_SESSION['pagina'])){
    $_SESSION['vista']=$vistas['home'];

//sino tiene una vista guardada en la sesion va a hombre

}elseif((!estaValidado()&&!isset($_SESSION['pagina'])) || isset($_REQUEST['login'])){
    //si ha pulsado login
    $_SESSION['pagina'] = 'login';
    $_SESSION['controlador']= $controladores['login'];
    $_SESSION['vista']=$vistas['login'];

    //le indico el controlador que gestiona la peticion

}elseif(isset($_SESSION['pagina'])){
    require_once $_SESSION['controlador'];
}
//  //PRUEBASSS

//  $arrayUsuarios = UsuarioDAO::findAll();
//  //print_r($arrayUsuarios);
//  $findById=UsuarioDAO::findById('u1');
//  //print_r($findById);
//  $usuario=new Usuario('maria',sha1('maria'),'maria','maria@gmail.com','ADM01');
//  //UsuarioDAO::insert($usuario);
//  $usuario->nombre = 'pepito';
//  if(!UsuarioDAO::update($usuario)){
//     echo 'No se ha modificado';
//  }
//  if(!UsuarioDAO::update($usuario->usuario)){
//     echo 'No se ha borrado';
//  }
require_once('./vista/layout.php');

