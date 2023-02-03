<?
require_once '../peticiones/';
if(isset($_REQUEST['acion'])){
    if($_REQUEST['acion']=='listar'){
        $lista = get();
        $lista = json_decode($lista,true);
        //tengo que listar conciertos, llamo a la 
        require '../vista/listar.php';
    }
}
if(isset($_REQUEST['acion'])){
    if($_REQUEST['acion']=='guardar'){
        //funcion comprobar formulario
        if(post($_REQUEST['grupo'],$_REQUEST['fecha'],$_REQUEST['precio'],$_REQUEST['lugar'])){
            //mne lleva a la vista con lo que he insertado
            $lista
        }else{

        }
        //hacemos post tras comprobar
        $lista = json_decode($lista,true);
        //tengo que listar conciertos, llamo a la 
        require '../vista/listar.php';
    }
}
?>