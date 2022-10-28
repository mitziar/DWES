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
    function validarFormulario($formulario){
        if(isset($formulario)){
            foreach ($formulario as $key => $value) {
                if(existe($key) && !vacio($key)){
                    if($key == 'checkboxElige'){
                        echo "<br> las asignaturas elegidas son: ";
                        foreach ($value as $clave => $valor) {
                            echo $valor."<br>";
                        }
                    }else{
                        echo "<label>".$key."</label> es ".$value;
                        echo "<br>";
                    }

                }else{

                }
            }
        }else{
            return false;
        }
    }
    function numeroCheck ($arrayChecks){
        if (count($_REQUEST['checkboxElige'])>=1 && count($_REQUEST['checkboxElige'])<=3){
            return true;
        }else{
            return false;
        }

    }

?>