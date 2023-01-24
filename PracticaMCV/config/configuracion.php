<?
//bbdd
require_once('./config/conexion.php');

//funciones
require_once('./core/funcionesSesiones.php');


//modelo 
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once('./model/Usuario.php');
// require_once('./modelo/Producto.php');
// require_once('./dao/UsuarioDAO.php');
// require_once('./dao/ProductoDAO.php');

//controladores
$controladores = array(    
    'login'=>'./controller/LoginController.php',
    'registro' =>'./controller/RegistroController.php',
    'home' => './controller/HomeController.php',
    'user' => './controller/UserController.php',
    'producto' => './controller/ProductoController.php',
    'admin' => './controller/AdminController.php',
);

//vistas
$vistas = array(
    'home'=>'homeView.php',
    'login'=>'loginView.php',
    'user'=>'UserView.php',
    'registro'=>'registroView.php',
    'verProducto'=>'verProductoView.php',
    'admin'=>'adminView.php',
    'listaProd'=>'listaProductosView.php'
);
