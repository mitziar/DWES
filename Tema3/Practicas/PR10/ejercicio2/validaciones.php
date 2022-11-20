<?php
/**
 * Comprueba que los valores que los valores que se envian en el formulario ($_REQUEST), excepto el valor
 * del nombre del alumno y el del guardar, sean números de uno o dos dígitos y que esten entre 0 y 10.
 * @return False si alguno de los número no son uno o dos digitos o no están entre 0 y 20.
 * @return True si los numeros son digitos entre 0 y 10.
 */
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
/**
 * Comprueba que se haya enviado el formulario. Esto es, cuando está establecido el valor guardar en el 
 * array que se genera al enviar el formulario ($_Request).
 * @return False si el guardar no ha sido establecido.
 * @return True si guardar ha sido establecido.
 */
function enviado(){
    if(!empty($_REQUEST['guardar'])){
        return true;
    }
    return false;
}
?>