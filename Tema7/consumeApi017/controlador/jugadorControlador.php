<?



if (isset($_REQUEST['accion'])) {
    require_once ('../peticiones/curl.php');
    require_once('../configuracion/configuracion.php');

    if ($_REQUEST['accion'] == 'listar') {
        $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador');
        $lista = json_decode($lista, true);
        require '../vista/listarJugadores.php';
    }  elseif($_REQUEST['accion'] == 'Guardar' ){

        if(isset($_REQUEST['nombre'])&&isset($_REQUEST['posicion'])&&isset($_REQUEST['sueldo'])&&isset($_REQUEST['codEquipo'])){

            $json= '{
                "nombre": "'.$_REQUEST['nombre'].'",
                "posicion": "'.$_REQUEST['posicion'].'",
                "sueldo": "'.$_REQUEST['sueldo'].'",
                "codEquipo": "'.$_REQUEST['codEquipo'].'"
            }';
            $url='http://192.168.100.127/DWES/Tema7/api017/index.php/jugador';
            if (post($json,$url)) {

                    $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador');

                    $lista = json_decode($lista, true);

                    require '../vista/listarJugadores.php';
            }else{
                echo "No se ha introducido.";
                require '../vista/formInsertJugador.php';
            }  
        }else{
            require '../vista/formInsertJugador.php';
        }

    }elseif($_REQUEST['accion'] == 'nuevoJugador') {
    
       require '../vista/formInsertJugador.php';

    }elseif ($_REQUEST['accion'] == 'modificarJugador') {
        
            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador/'.$_REQUEST['codJugador']);
            $lista = json_decode($lista, true);
            require '../vista/formModJugador.php';
        
    }elseif ($_REQUEST['accion'] == 'Modificar') {

        if(isset($_REQUEST['nombre'])&&isset($_REQUEST['posicion'])&&isset($_REQUEST['sueldo'])&&isset($_REQUEST['codEquipo'])){

            $json= '{
                "nombre": "'.$_REQUEST['nombre'].'",
                "posicion": "'.$_REQUEST['posicion'].'",
                "sueldo": "'.$_REQUEST['sueldo'].'",
                "codEquipo": "'.$_REQUEST['codEquipo'].'"
            }';
            $url='http://192.168.100.127/DWES/Tema7/api017/index.php/jugador/'.$_REQUEST['codJugador'];

            if (put($json, $url)) {
                
                $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador');
                $lista = json_decode($lista, true);
                require '../vista/listarJugadores.php';

            } else {
                echo "No se ha modificado";
                require '../vista/formModJugador.php';
            }
        }
        
    }elseif ($_REQUEST['accion'] == 'eliminarJugador') {
        //funcion comprobar formulario
        if (delete('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador/'.$_REQUEST['codJugador'])) {

            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador');

            $lista = json_decode($lista, true);

            require '../vista/listarJugadores.php';
        } else {
            echo "No se ha eliminado";
            require '../vista/listarJugadores.php';
        }
    }else if ($_REQUEST['accion'] == 'Buscar Jugador') {
        //funcion comprobar formulario
        if (isset($_REQUEST['idJugador'])) {
            //mne lleva a la vista con lo que he insertado
            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador/'.$_REQUEST['idJugador']);
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listarJugadores.php';
        } else {
            require '../vista/formInsertJugador.php';
        }
    }else if ($_REQUEST['accion'] == 'Buscar Nombre') {
        //funcion comprobar formulario
        if (isset($_REQUEST['nombreJugador'])) {
            //mne lleva a la vista con lo que he insertado
            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador?nombre='.$_REQUEST['nombreJugador']);
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listarJugadores.php';
        } else {
            require '../vista/formInsertJugador.php';
        }
    }else if ($_REQUEST['accion'] == 'Buscar Posicion') {
        //funcion comprobar formulario
        if (isset($_REQUEST['posicionJugador'])) {
            //mne lleva a la vista con lo que he insertado
            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador?posicion='.$_REQUEST['posicionJugador']);
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listarJugadores.php';
        } else {
            require '../vista/formInsertJugador.php';
        }
    }else if ($_REQUEST['accion'] == 'Buscar Sueldo') {
        //funcion comprobar formulario
        if (isset($_REQUEST['sueldoMinJugador'])&&isset($_REQUEST['sueldoMaxJugador'])) {
            //mne lleva a la vista con lo que he insertado
            $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador?sueldoMin='.$_REQUEST['sueldoMinJugador']."&sueldoMax=".$_REQUEST['sueldoMaxJugador']);
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listarJugadores.php';
        } else {
            require '../vista/formInsertJugador.php';
        }
    }
}else{
        require_once ('./peticiones/curl.php');
        require_once('./configuracion/configuracion.php');
        $lista = get('http://192.168.100.127/DWES/Tema7/api017/index.php/jugador');
        $lista = json_decode($lista, true);
        require_once('./vista/listarInfoJugadores.php');
}
