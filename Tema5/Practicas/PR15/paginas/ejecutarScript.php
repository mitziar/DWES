<?php
    include ('../funciones/bd.php');
    include ('../seguro/conexion.php');
    $mensaje=ejecutarScript();
    if($mensaje!=true){
      $_SESSION['error']= $mensaje;
    }else{
        header('Location: ../index.php');
        exit();
    }
?>