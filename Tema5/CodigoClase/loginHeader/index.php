<?php
//Esto se guarda en la superglobal
//sabemos si se ha autenticado o no con $_SERVER['PHP_AUTH_USER'] si no existe esta variable, 
//no abra gente autenticada, si existe está autenticada

if(!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    //para generar el error
    header('HTTP/1.0 401 Unauthorized');
    echo 'No autorizado';
}elseif($_SERVER['PHP_AUTH_USER']=='itziar' && $_SERVER['PHP_AUTH_PW']=='itziar'){//esto se busca en BD o fichero, lo pongo a mano para el ejemplo
    header('Location: ./paginaConPermiso.php');
}else{
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'No autorizado';
}


?>