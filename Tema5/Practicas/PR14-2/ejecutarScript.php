<?php
    include ('./funcionesBD.php');
    $mensaje=ejecutarScript();
    if($mensaje!='ok'){
      echo $mensaje;
    }else{
        header('Location: ./index.php');
        exit();
    }
?>