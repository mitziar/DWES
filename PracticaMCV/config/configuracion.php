<?
//bbdd
require_once('./config/conexion.php');

//funciones
require_once('./core/funcionesSesiones.php');


//modelo 
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once('./model/Usuario.php');
require_once('./model/Producto.php');
require_once('./model/Venta.php');
require_once('./model/Albaran.php');
require_once('./dao/UsuarioDao.php');
require_once('./dao/ProductoDAO.php');
require_once('./dao/VentaDao.php');
require_once('./dao/AlbaranDao.php');

//controladores
$controladores = array(    
    'login'=>'./controller/LoginController.php',
    'registro' =>'./controller/RegistroController.php',
    'home' => './controller/HomeController.php',
    'user' => './controller/UserController.php',
    'producto' => './controller/ProductoController.php',
    'admin' => './controller/AdminController.php',
    'venta' => './controller/VentaController.php',
    'albaran'=>'./controller/AlbaranController.php',
);

//vistas
$vistas = array(
    'home'=>'homeView.php',
    'login'=>'loginView.php',
    'user'=>'UserView.php',
    'registro'=>'registroView.php',
    'verProducto'=>'verProductoView.php',
    'verVenta'=>'verVentaView.php',
    'listaProd'=>'listaProductosView.php',
    'modificarVenta' => 'modificarVentaView.php',
    'editarUser'=> 'editarUserView.php',
    'insertarUser'=> 'insertarUserView.php',
    'insertarProducto'=> 'insertarProductoView.php',
    'modificarProducto'=> 'modificarProductoView.php',
    'administrarProductos'=> 'administrarProductoView.php',
    'administrarAlbaranes'=> 'administrarAlbaranesView.php',
    'modificarAlbaran'=> 'modificarAlbaranView.php'
);
