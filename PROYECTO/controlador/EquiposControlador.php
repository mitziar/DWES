<?php
if (isset($_REQUEST['insertarEquipo']) && !camposVacios()) {
    $rutaGuardado = "./webroot/imagenes/";
    $rutaGuardado2 = "./webroot/imagenes_QR/";
    $rutaConNombreFichero = $rutaGuardado .  $_FILES['imagen']['name'];
    $rutaConNombreFichero2 = $rutaGuardado2 .  $_FILES['imagen_QR']['name'];

    if(!move_uploaded_file( $_FILES['imagen']['tmp_name'],$rutaConNombreFichero))
    {
        $_SESSION['errores']='No se ha guardado la imagen';
        $_SESSION['controlador'] = $controladores['equipos'];
        $_SESSION['vista'] = $vistas['equipos'];
        require_once $_SESSION['controlador'];

    }elseif(!move_uploaded_file( $_FILES['imagen_QR']['tmp_name'],$rutaConNombreFichero2))
    {
        $_SESSION['errores']='No se ha guardado la imagen QR';
        $_SESSION['controlador'] = $controladores['equipos'];
        $_SESSION['vista'] = $vistas['equipos'];
        require_once $_SESSION['controlador'];
    }else{

    $json= '{
        "equipo": "'.$_REQUEST['equipo'].'",
        "caracteristicas": "'.$_REQUEST['caracteristicas'].'",
        "estado": "Disponible",
        "imagen": "'.$_FILES['file']['imagen'].'",
        "imagen_QR": "'.$_FILES['file']['imagen_QR'].'",
        "activo": 1,
        "codigo_categoria": '.(int)$_REQUEST['categoria'].'
        }';

    $url='http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/equipo';
    $resultado = post($json, $url);
    $_SESSION['controlador'] = $controladores['equipos'];
    $_SESSION['vista'] = $vistas['equipos'];
    require_once $_SESSION['controlador'];
    }
}
