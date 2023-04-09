<?php

 require_once './controlador/ControladorPadre.php';
 require_once './controlador/ControladorEquipo.php';
 require_once './controlador/ControladorCategoria.php';
 require_once './controlador/ControladorUsuario.php';
 require_once './controlador/ControladorRol.php';
 require_once './controlador/ControladorIncidencia.php';
 require_once './controlador/ControladorSolicitud.php';

 require_once './modelo/Equipo.php';
 require_once './modelo/Categoria.php';
 require_once './modelo/Rol.php';
 require_once './modelo/Usuario.php';
 require_once './modelo/Incidencia.php';
 require_once './modelo/Solicitud.php';

 require_once './dao/DAO.php';
 require_once './dao/FactoryBD.php';
 require_once './dao/UsuarioDAO.php';
 require_once './dao/EquipoDAO.php';
 require_once './dao/CategoriaDAO.php';
 require_once './dao/RolDAO.php';
 require_once './dao/IncidenciaDAO.php';
 require_once './dao/SolicitudDAO.php';

 $recurso = ControladorPadre::recurso();
 if ($recurso) {

    if ($recurso[1] == 'usuario') {
    
        $controlador = new ControladorUsuario();
        $controlador -> controlar();

    } elseif ($recurso[1] == 'equipo') {

        $controlador = new ControladorEquipo();
        $controlador -> controlar();

    } elseif ($recurso[1] == 'categoria') {

        $controlador = new ControladorCategoria();
        $controlador -> controlar();

    }elseif ($recurso[1] == 'rol') {

        $controlador = new ControladorRol();
        $controlador -> controlar();

    }elseif ($recurso[1] == 'incidencia') {

        $controlador = new ControladorIncidencia();
        $controlador -> controlar();

    }elseif ($recurso[1] == 'solicitud') {

        $controlador = new ControladorSolicitud();
        $controlador -> controlar();

    }
}
