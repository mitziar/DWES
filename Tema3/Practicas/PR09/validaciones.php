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
        if (strtotime($fecha)){
            return true;
        }else{
            return false;
        }
    }
    function esMayorEdad($edad){
        $fechaHoy= new DateTime();
        $fechaUsuario = new DateTime(strtotime($_REQUEST['fecha']));

        if($fechaHoy->diff($fechaUsuario)<18){
            return false;
        }else{
            return true;
        }
    }
?>