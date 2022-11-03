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
    function validado(){
        $errores=array();
        if(enviado()){
            foreach($_REQUEST as $key => $value){
                if($key=='checkboxElige'){
                    if(count($value)<1 || count($value)>3){
                        array_push($errores,$key);
                    }
                }else if($key =='radioObligatorio' || $key =='eligeOpcion' || $key =='email' || $key=='pass'){
                    if(!existe($value)){
                        array_push($errores,$key);
                    }
                }else{
                    if (vacio($value)){        
                        array_push($errores,$key);
                    }                    
                }
            }
            echo count($errores);
            foreach ($errores as $key => $value) {
                echo $value."<br>";
            }
            if(count($errores)==0){
                return true;
            }else{
                foreach ($errores as $key) {
                    //echo "<span>".$key."</span><br>";
                }
                return false;
            }
        }else{
            return false;
        }
    }

?>