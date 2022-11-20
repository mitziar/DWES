<?php
function validado(){
    $errores= array();
    foreach ($_REQUEST as $key => $value) {
        if($key!='nombreAlumno' && $key!='guardar'){
            $patron='/^[0-9]{1,2}$/';
            if(($value<0 || $value>10) && !preg_match($patron,$value)){
                array_push($errores,'Nota no valida');
            }
        }
    }
    if(count($errores)==0){
        return true;
    }
    return false;
}
function enviado(){
    if(!empty($_REQUEST['guardar'])){
        return true;
    }
    return false;
}
?>