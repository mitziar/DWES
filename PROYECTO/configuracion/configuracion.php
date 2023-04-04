
<?php
//bbdd
require_once('./configuracion/conexion.php');

//funciones
require_once('./core/funcionesSesiones.php');

//dao
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once('./dao/UsuarioDAO.php');
require_once('./dao/EquipoDAO.php');

//modelo
require_once('./modelo/Categoria.php');
require_once('./modelo/Equipo.php');
require_once('./modelo/Incidencia.php');
require_once('./modelo/Rol.php');
require_once('./modelo/Solicitud.php');
require_once('./modelo/Usuario.php');

//controladores
$controladores = array(    
    'login'=>'./controlador/LoginControlador.php',
    'home' => './controlador/HomeControlador.php',
    'user' => './controlador/UsusarioControlador.php'
);

//vistas
$vistas = array(
    'login'=>'login.php'
);
