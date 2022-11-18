<?php
function validado(){
    foreach ($_REQUEST as $key => $value) {
        if($key!='nombreAlumno'){
            $patron='/^[0-9]{1,2}$/';
            if(($value>=0 || $value<=10) && preg_match($patron,$value)){
                return true;
            }
        }
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