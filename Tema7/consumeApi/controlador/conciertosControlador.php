<?
require_once '../peticiones/curl.php';
if (isset($_REQUEST['accion'])) {
    if ($_REQUEST['accion'] == 'listar') {
        $lista = get();
        $lista = json_decode($lista, true);
        //tengo que listar conciertos, llamo a la 
        require '../vista/listar.php';
    } else if ($_REQUEST['accion'] == 'Guardar') {
        //funcion comprobar formulario
        if (post($_REQUEST['grupo'], $_REQUEST['fecha'], $_REQUEST['precio'], $_REQUEST['lugar'])) {
            //mne lleva a la vista con lo que he insertado
            $lista = get();
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listar.php';
        } else {
            require '../vista/formInsert.php';
        }
    } else if ($_REQUEST['accion'] == 'modificar') {
        //funcion comprobar formulario
        if (put($_REQUEST['id'],$_REQUEST['grupo'], $_REQUEST['fecha'], $_REQUEST['precio'], $_REQUEST['lugar'])) {
            //mne lleva a la vista con lo que he insertado
            $lista = get();
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listar.php';
        } else {
            require '../vista/formInsert.php';
        }
    }else if ($_REQUEST['accion'] == 'borrar') {
        //funcion comprobar formulario
        if (delete($_REQUEST['id']) {
            //mne lleva a la vista con lo que he insertado
            $lista = get();
            //hacemos post tras comprobar
            $lista = json_decode($lista, true);
            //tengo que listar conciertos, llamo a la 
            require '../vista/listar.php';
        } else {
            require '../vista/formInsert.php';
        }
    }
}
