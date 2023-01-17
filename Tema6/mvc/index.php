 <?
 require './config/configuracion.php';
  



//sino tiene una vista guardada en la sesion va a hombre

if(!isset($_SESSION['pagina'])){


    $_SESSION['vista']=$vista['home'];


  

}elseif(isset($_REQUEST['login'])){
    //si ha pulsado login
    $_SESSION['pagina'] = 'login';
    $_SESSION['controlador']= $controladores['login'];
    $_SESSION['vista']=$vista['login'];

    //le indico el controlador que gestiona la peticion

}elseif(isset($_REQUEST['pagina'])){
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

