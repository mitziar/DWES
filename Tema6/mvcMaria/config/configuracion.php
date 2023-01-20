<?
//bbdd
require_once('./config/conexion.php');

//funciones
require_once('./core/funcionesSesiones.php');
require_once('./core/valida.php');


//modelo 
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once('./modelo/Usuario.php');
require_once('./dao/UsuarioDAO.php');

//controladores
$controladores = array(    
    'login'=>'./controlador/loginController.php',
    'registro'=>'./controlador/RegistroController.php',
    'home'=>'./controlador/homeController.php',
    'user' => './controlador/UserController.php'
);

//vistas
$vistas = array(
    'home'=>'homeView.php',
    'login'=>'loginView.php',
    'user'=>'UserView.php',
    'registro'=>'registroView.php'
);




