<?
//todos los requires que necesite el index

//BBDD
require_once('./config/conexion.php');//fichero de configuracion de la bd
//pongo la direccion desde el index, porque es donde se va a requerir
require_once('./vista/layout.php');

//MODELO: por orden
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once ('./modelo/Usuario.php');
require_once ('./dao/UsuarioDAO.php');
require_once('./core/funcionesSesion.php');


//controladores
$controladores = array(
    'login'=>'loginController.php'
);


//vistas

//clave valor de todas las vistas que hay
$vistas = array(
    'home'=>'homeView.php',
    'login'=>'loginView.php'
);

?>