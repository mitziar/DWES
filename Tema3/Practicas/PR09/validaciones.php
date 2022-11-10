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

        if($letras[substr($dni,0,8)%23] == substr($dni,8,1)){
            return true;
        }
        return false;
    }
?>