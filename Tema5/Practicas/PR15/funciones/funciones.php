<?php

function enviado(){
    if(isset($_REQUEST['enviar'])){
        return true;
    }
    return false;
}
function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}
function validado(){

    foreach ($_REQUEST as $key => $value) {

        if (vacio($key)){
            return false;
        }else{

                switch ($key){
                    case "user":
                       if(existeUser($value)){
                        return false;
                       }
                        break;

                    case "pass":
                        if(!contraseñaValida($_REQUEST['pass'])){
                          return false;  
                        }
                        break;

                    case "email":
                        if(!emailValido($value)){
                            return false;
                        }
                        break;

                    case "fecha":
                         if(!fechaValida($value)){
                            return false;
                        }
                        break;
                    default:
                        break;
                }
            
        }
    }
    return true;
}
function validado2(){

    foreach ($_REQUEST as $key => $value) {

        if (vacio($key)){
            return false;
        }else{

                switch ($key){
                    
                    case "pass":
                        if(!contraseñaValida($_REQUEST['pass'])){
                          return false;  
                        }
                        break;

                    case "email":
                        if(!emailValido($value)){
                            return false;
                        }
                        break;

                    case "fecha":
                         if(!fechaValida($value)){
                            return false;
                        }
                        break;
                    default:
                        break;
                }
            
        }
    }
    return true;
}
function contraseñaValida($pass){
    $patron = '/[A-Z]{1,1}[a-z]{1,1}[0-9]{1}/';
    if(preg_match($patron,$pass)){
        return true;
    }
    return false;
}
function emailValido($email){
    $patron="/^\D+(@)\D+(\.)\D{2,}$/";
    if(preg_match($patron,$email)){
        return true;
    }
    return false;
}
function fechaValida($fecha){
    $patron = '/\d{4}(\-)\d{2}(\-)\d{2}/';
    if(preg_match($patron,$fecha)){
        $datosFecha = explode('-',$fecha);
        if($datosFecha[1]>1&&$datosFecha[1]<13){
            if($datosFecha[2]>1&&$datosFecha[2]<32){
                return true;
            }
        }
        
    }
    return false;
}
function cantidadValida($cantidad,$producto){
    $cantidad=intval($cantidad);
    $infoProducto=obtenerProducto(intval($producto));
    if(is_array($infoProducto)){
        $patron='/^\d{1,}$/';
       if(preg_match($patron,$cantidad) && $cantidad>0 && $cantidad<=intval($infoProducto['stock'])){
        return true;
       }
    }
    return false;
}
function precioValido($precio){
    
    $patron='/^\d{1,4}(.)\d{1,2}$/';
       if( $precio>0 && preg_match($patron,doubleval($precio))){
        return true;
       }

    return false;
}
function productoValido($producto){
    $infoProducto=obtenerProducto($producto);
    if(is_array($infoProducto)){
        return true;
    }
    return false;
}
function usuarioValido($usuario){
    $infoUsuario=obtenerUser($usuario);
    if(is_array($infoUsuario)){
        return true;
    }
    return false;
}
function validaModificar(){
    foreach ($_REQUEST as $key => $value) {

        if (vacio($key)){
            return false;
        }else{

                switch ($key){
                    
                    case "fecha":
                        if(!fechaValida($value)){
                          return false;  
                        }
                        break;

                    case "cantidad":
                        if(!cantidadValida($value, $_REQUEST['producto'])){
                            return false;
                        }
                        break;

                    case "precio":
                         if(!precioValido($value)){
                            return false;
                        }
                        break;
                    case "producto":
                        if(!productoValido($value)){
                            return false;
                        }
                        break;
                    case "usuario":
                        if(!usuarioValido($value)){
                            return false;
                        }
                        break;
                    default:
                        break;
                }
            
        }
    }
    return true;
}
function stockValido($stock){
    
    $patron='/^\d{1,}$/';
       if( $stock>0 && preg_match($patron,$stock)){
        return true;
       }

    return false;
}

function validadoProducto(){
    foreach ($_REQUEST as $key => $value) {

        if (vacio($key)){
            return false;
        }else{

                switch ($key){
                    
                    case "precio":
                         if(!precioValido($value)){
                            return false;
                        }
                        break;
                    case "stock":
                        if(!stockValido($value)){
                            return false;
                        }
                        break;
                    default:
                        break;
                }
            
        }
    }
    return true;
}
function estaValidado(){
    if(isset($_SESSION['validado'])){
        return true;
    }
}
function esAdmin(){
    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil']==1)
        return true;
    }
    return false;
}
function esModerador(){
    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil']==2)
        return true;
    }
    return false;
}