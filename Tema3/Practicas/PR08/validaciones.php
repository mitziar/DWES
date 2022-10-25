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

?>