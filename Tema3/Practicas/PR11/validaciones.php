<?php
/**
 * Función que comprueba si el formulario está enviado.
 * @return True el formulario ha sido enviado.
 * @return False el formulario no ha sido enviado
 */
function enviado(){
    if( isset($_REQUEST['enviar']) && !empty($_REQUEST['enviar']) ){
        return true;
    }
    return false;
}

/**
 * Funcion que comprueba si se han validado los datos que contiene el formulario.
 * 
 * @return True los datos del formulario son correctos. Está validado.
 * @return False los datos del formulario no son correctos. No está validado.
 */
function validado(){
    $errores= array();
    $patron='/^[0-9]{1,2}$/';
    foreach ( $_REQUEST as $key => $value ) {
        if( $key!='enviar' && $key!='nombre'){
            if(( floatval($value) < 0 || floatval($value) > 10) && !preg_match($patron,$value)){
                array_push($errores,$key.'no valida<br>');
            }
        }
    }
    if(count($errores)!=0){
        return false;
    }else{
        return true;
    }
}

?>