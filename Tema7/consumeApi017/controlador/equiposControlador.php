<?
if (isset($_REQUEST['accion'])) {
    require_once ('../peticiones/curl.php');
    require_once('../configuracion/configuracion.php');
    if ($_REQUEST['accion'] == 'listar') {

        $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo');
        $lista = json_decode($lista, true);
        require '../vista/listarEquipos.php';

    } elseif($_REQUEST['accion'] == 'Guardar' ){

        if(isset($_REQUEST['nombre'])&&isset($_REQUEST['localidad'])){

            $json= '{
                "nombre": "'.$_REQUEST['nombre'].'",
                "localidad": "'.$_REQUEST['localidad'].'"
            }';
            $url='http://192.168.100.127/DWES/Tema7/api017/index.php/equipo';
            if (post($json,$url)) {
                    //mne lleva a la vista con lo que he insertado
                    $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo');
                    //hacemos post tras comprobar
                    $lista = json_decode($lista, true);
                    //tengo que listar conciertos, llamo a la 
                    $_SESSION['vista'] = $vistas['listarEquipos'];
                    require '../vista/listarEquipos.php';
            }else{
                echo "No se ha introducido.";
                require '../vista/formInsertEquipo.php';
            }  
        }else{
            require '../vista/formInsertEquipo.php';
        }

    }elseif($_REQUEST['accion'] == 'nuevoEquipo') {
    
       require '../vista/formInsertEquipo.php';

    }elseif ($_REQUEST['accion'] == 'modificarEquipo') {
        
            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo/'.$_REQUEST['idEquipo']);
            $lista = json_decode($lista, true);
            require '../vista/formModEquipo.php';
        
    }elseif ($_REQUEST['accion'] == 'Modificar') {

        if(isset($_REQUEST['nombre'])&&isset($_REQUEST['localidad'])){

            $json= '{
            "nombre": "'.$_REQUEST['nombre'].'",
            "localidad": "'.$_REQUEST['localidad'].'"
            }';

            $url='http://192.168.100.127/DWES/Tema7/api017/index.php/equipo/'.$_REQUEST['idEquipo'];

            if (put($json, $url)) {
                
                $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo');
                $lista = json_decode($lista, true);
                require '../vista/listarEquipos.php';

            } else {
                echo "No se ha modificado";
                require '../vista/formModEquipo.php';
            }
        }
        
    }elseif ($_REQUEST['accion'] == 'eliminarEquipo') {
        //funcion comprobar formulario
        if (delete('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo/'.$_REQUEST['idEquipo'])) {

            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo');

            $lista = json_decode($lista, true);

            require '../vista/listarEquipos.php';
        } else {
            echo "No se ha eliminado";
            require '../vista/listarEquipos.php';
        }
    }else if ($_REQUEST['accion'] == 'Buscar Equipo') {
        //funcion comprobar formulario
        if (isset($_REQUEST['idEquipo'])) {
            //mne lleva a la vista con lo que he insertado
            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo/'.$_REQUEST['idEquipo']);
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listarEquipos.php';
        } else {
            require '../vista/formInsertEquipo.php';
        }
    }
}else{
    require_once ('./peticiones/curl.php');
    require_once('./configuracion/configuracion.php');
        $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/equipo');
        $lista = json_decode($lista, true);
        $_SESSION['vista'] = $vistas['listarEquipos'];
        require_once('./vista/listarInfoEquipos.php');
}
