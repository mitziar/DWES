<?

function estaValidado(){
    if(isset($_SESSION['validado'])){
        return true;
    }
    return false;
}

function esAdmin(){
    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil'] == 1)
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

