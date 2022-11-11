<?php
    function vacio($nombre){
        if(empty($_REQUEST[$nombre])){
            return true;
        }
        return false;
    }

    function enviado(){
        if(isset($_REQUEST['enviar'])){
            return true;//Existe la variable enviar en la cadena rquest, que es el name que pusimos al submit
        }
        return false;
    }
    function existe($nombre){
        if(isset($_REQUEST[$nombre])){
            return true;//Existe la variable enviar en la cadena rquest, que es el name que pusimos al submit
        }
        return false;
    }
    function esFechaValida($fecha){
        if (strtotime($_REQUEST[$fecha])){
            return esMayorEdad($_REQUEST[$fecha]);
        }else{
            return false;
        }
    }
    function esMayorEdad($edad){
        $fechaHoy= new DateTime();
        $fechaUsuario = new DateTime($edad);
        
        $diferencia = $fechaHoy->diff($fechaUsuario);

        if(($diferencia->y)>=18){
            return true;
        }else{
            return false;
        }
    }
    function letraDni($dni){
        $letras = array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');


        if($letras[intval(substr($_REQUEST[$dni],0,8))%23] == substr($_REQUEST[$dni],8,1)){
            return true;
        }
        return false;
    }
    function validaContrasena($cadena){
        
        $patron1='/[A-Z]+/';
        $patron2='/[a-z]+/';
        $patron3='/[0-9]+/';
        if(preg_match($patron1,$cadena) && preg_match($patron2,$cadena) && preg_match($patron3,$cadena)){
            return true;
        }
        return false;
    }
    function validado(){

        foreach ($_REQUEST as $key => $value) {

            if (vacio($key)){
                return false;
            }else{
                if($key=='contrasena'){
                    if(!validaContrasena($_REQUEST['contrasena']))
                    return false;
                }else{
                    switch ($key){
                        case "nombre":
                            $patron='/\D{3,}/';
                            break;
                        case "apellidos":
                            $patron='/\D{3,}(\s)\D{3,}/';
                            break;
                        case "fecha":
                            $patron='/\d{4}(\-)\d{2}(\-)\d{2}/';
                            break;
                        case "dni":
                            $patron = '/^[0-9]{8}[A-Z]{1}$/';
                            break;
                        case "email":
                            $patron="/^\D+(@)\D+(\.)\D{2,}$/";
                            break;
                        case "imagen":
                            $patron='/^[\D|\d]+(\.)(jpg)|(bmp)|(png)$/';
                        default:
                            break;
                    }
                    if(preg_match($patron,$_REQUEST[$key])){
                        return true;
                    }
                }
            }
        }
        return false;
    }
    function validaFormulario(){
        if(!empty($_FILES['imagen']['name'])){
            $patron='/^[\D|\d]+(\.)(jpg)|(bmp)|(png)$/';                     
            if( preg_match($patron,$_FILES['imagen']['name'])){
                return true;
            }
        }
        return false;
    }

?>