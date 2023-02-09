<?


function esAdmin(){
    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil'] == 'admin')
             return true;
    }
    return false;
}

function esModerador(){
    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil'] == 2)
             return true;
    }
    return false;
}
function camposVacios(){
    foreach ($_REQUEST as $key => $value) {
        if(empty($value)){
            return true;
        }
    }
    return false;
}
function validPassword($pass){
    if(strlen($pass)>=8){
        $patron="/[\D|\d][A-Z]{1}[a-z]{1}[0-9]{1}$/";
        if(preg_match($patron,$pass)){
            return true;
        }else{
            $_SESSION['error']='La contraseña debe acabar en una mayuscula, una minuscula y un número';
        }
    }else{
        $_SESSION['error']='La contraseña debe tener 8 al menos caracteres.';
    }
    return false;
}

