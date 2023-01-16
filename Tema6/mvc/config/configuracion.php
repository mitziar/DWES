<?
//todos los requires que necesite el index

//BBDD
require_once('./config/conexion.php');//fichero de configuracion de la bd
//pongo la direccion desde el index, porque es donde se va a requerir


//MODELO: por orden
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once ('./modelo/Usuario.php');
require_once ('./dao/UsuarioDAO.php');


//controladores



//vistas

?>