<?php
if(isset($_REQUEST['eliminarAlbaran'])&&isset($_REQUEST['codigoAlbaran'])){
    if(AlbaranDao::delete($_REQUEST['codigoAlbaran'])){
        require_once $_SESSION['controlador'];
   }else{
    $_SESSION['error']='No se ha eliminado el albaran';
   } 
}

if(isset($_REQUEST['modificarAlbaran'])&&!camposVacios()){
    $albaran=new Albaran($_REQUEST['codigoAlbaran'],$_REQUEST['fecha'],$_REQUEST['cantidad'],$_REQUEST['codigo'],$_REQUEST['usuario']);
    if($albaran){
        if(AlbaranDao::update($albaran)){
            $_SESSION['pagina'] = 'administrarAlbaranes';    
            $_SESSION['vista'] = $vistas['administrarAlbaranes'];
            require_once $_SESSION['controlador'];
        }else{
            $_SESSION['error'] ='No se ha modificado el albaran';
        }
   }else{
        $_SESSION['error']='No se ha modificado el albaran';
   } 
}elseif(isset($_REQUEST['modificarAlbaran'])){
    $_SESSION['pagina'] = 'modificarAlbaran';    
    $_SESSION['vista'] = $vistas['modificarAlbaran'];
    require_once $_SESSION['controlador'];
    
}

?>