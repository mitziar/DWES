<?php
function vacio($nombre)
{
    if (empty($_REQUEST[$nombre])) {
        return true;
    }
    return false;
}

function enviado()
{
    if (isset($_REQUEST['enviar'])) {
        return true; //Existe la variable enviar en la cadena rquest, que es el name que pusimos al submit
    }
    return false;
}
function existe($nombre)
{
    if (isset($_REQUEST[$nombre])) {
        return true; //Existe la variable enviar en la cadena rquest, que es el name que pusimos al submit
    }
    return false;
}
function validado()
{
    $errores = array();
    if (enviado()) {
            if(!existe('checkboxElige')){
                array_push($errores,'checkboxElige');
            }elseif(!existe('radioObligatorio')){
                array_push($errores,'radioObligatorio');
            }else{
                foreach ($_REQUEST as $key => $value) {
                
                    if ($key == 'checkboxElige') {
                        
                        if (count($value) < 1 || count($value) > 3) {
                            array_push($errores, $key);
                        }
                    } else if ($key == 'radioObligatorio' || $key == 'eligeOpcion' || $key == 'email' || $key == 'pass') {
                        if (vacio($key)) {
                            array_push($errores, $key);
                        }
                    } else {
                        if (!str_contains($key,'Opcional')) {
                            if (vacio($key)) {
                                array_push($errores, $key);
                            }
                        }
                    }
                }
            }
        if (count($errores) == 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>