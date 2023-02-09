<?
//bbdd
require_once('./config/conexion.php');

//funciones
require_once('./core/funcionesSesiones.php');


//modelo 
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once('./dao/UsuarioDao.php');
require_once('./dao/ApuestaDao.php');
require_once('./dao/SorteoDao.php');

require_once('./model/Sorteo.php');
require_once('./model/Apuesta.php');
require_once('./model/Usuario.php');


//controladores
$controladores = array(    
    'login'=>'./controller/controladorLogin.php',
    'apuesta' =>'./controller/apuestaController.php',
    'home' => './controller/HomeController.php',
    'user' => './controller/UserController.php',
    'verApuestas' => './controller/verApuestasController.php'
);

//vistas
$vistas = array(
    'home'=>'homeView.php',
    'login'=>'loginView.php',
    'apuesta'=>'apuestaView.php',
    'modificar'=>'modificaApuesaView.php',
    'verApuestas' => 'verApuestasView.php',
    'sorteado'=>'sorteadoView.php'
);
