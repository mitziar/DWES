<?php
function validado(){
    return false;
}
/**
 * Comprueba si el el formulario ha sido enviado
 */
function enviado(){
    if(isset($_REQUEST['guardar'])||isset($_REQUEST['eliminar'])){
        return true;
    }
    return false;
}
?>