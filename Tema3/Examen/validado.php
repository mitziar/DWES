<?php
/**
 * Comprueba que el formurario se haya enviado
 * @return True el formurario  enviado
 * @return False el formurario no enviado
 */
function enviado(){
    if (isset($_REQUEST['Enviado'])){
        return true;
    }
    return false;
}
/**
 * Comprueba que los campos sean correctos segun los patrones
 * @return True los campos son correctos
 * @return False los campos no son correctos
 */
function validado(){

        $errores = array();
        foreach ($_REQUEST as $key => $value) {
            if($key=='nombre'){
                    $patron='/[A-Z]{1}[a-z]{2,}(\s)[A-Z]{1}[a-z]{2,}(\s)[A-Z]{1}[a-z]{2,}/';
                    if(!preg_match($patron,$_REQUEST['nombre'])){
                        array_push($errores,"error nombre");
                
                    }
            }elseif($key=='exp'){
                $patron='/\d{2}[a-z]{3}(\/)\d{2}/';
                if(!preg_match($patron,$_REQUEST['exp'])){
                    array_push($errores,"error exp");
            
                }
            }elseif($key=='cursos'){
                if(intval($_REQUEST['cursos'])==0){
                    array_push($errores,"error exp");
                }
    
            }
        }
        if(count($errores)==0){
            return true;
        }else{
            return false;
        }
}
?>