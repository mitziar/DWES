
<?php
//bbdd
require_once('./configuracion/conexion.php');

//funciones
require_once('./core/funcionesSesiones.php');

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
    'registrar'=>'./controlador/RegistrarControlador.php',
    'equipos'=>'./controlador/EquiposControlador.php',
    'perfil' => './controlador/PerfilControlador.php',
    'user' => './controlador/UsusarioControlador.php'
    
);

//vistas
$vistas = array(
    'login'=>'login.php',
    'equipos'=>'equiposVista.php',
    'equipoNuevo'=>'equipoNuevoVista.php',
    'perfil'=>'perfilVista.php',
    'registrar'=>'registrar.php'
);
