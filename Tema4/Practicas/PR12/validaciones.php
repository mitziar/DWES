<?php
/**
 * Valida los campos del fomulario. Que no este vacio y que cumpla patron.
 * @return true si está validado
 * @return false si no está validado
 */
function validado(){
    $errores=array();
    if(enviado() && isset($_REQUEST['eliminar'])){
        return true;
    }
    if(enviado() && (isset($_REQUEST['guardar'])||isset($_REQUEST['insertar']))){
        foreach ($_REQUEST as $key => $value) {
            if($key=='nombre'){
                $patron='/^[A-Z]{1}[a-z]{1,}$/';
                if(vacio($_REQUEST['nombre'])||!preg_match($patron,$_REQUEST['nombre'])){
                    array_push($errores,'Nombre vacio o no cumple patrón');
                }
            }elseif($key=='nota'){
                $patron='/^[0-9]{1,2}\.[0-9]{1,2}$/';
                if(vacio($_REQUEST['nota'])||!preg_match($patron,$_REQUEST['nota'])){
                    array_push($errores,'Nota vacia o no cumple patrón');
                }
            }elseif($key=='fecha'){
                $patron='/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/';
                if(vacio($_REQUEST['fecha'])||!preg_match($patron,$_REQUEST['fecha'])){
                    array_push($errores,'Fecha vacia o no cumple patrón');
                }elseif(!vacio($_REQUEST['fecha'])){
                         $fechaExplode=explode('-',$_REQUEST['fecha']);
                        if($fechaExplode[1]>0 && $fechaExplode[1]<=12 && $fechaExplode[2]>0 && $fechaExplode[2]<=31){
                        }else{
                            array_push($errores,'Fecha no válida');
                        }  
                }
            }
        }
    }
    if(count($errores)==0){
        return true;
    }
    return false;
}
/**
 * Comprueba si el el formulario ha sido enviado
 */
function enviado(){
    if(isset($_REQUEST['guardar'])||isset($_REQUEST['eliminar'])||isset($_REQUEST['insertar'])){
        return true;
    }
    return false;
}
function vacio($urlParametro){
    if(empty($urlParametro)){
        return true;
    }
    return false;
}

?>