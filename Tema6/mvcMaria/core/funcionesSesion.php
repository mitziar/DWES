<?php
function estaValidado(){
    if(isset($_SESSION['validado'])){
        return true;
    }
}
function esAdmin(){
    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil']=='ADM01')
        return true;
    }
    return false;
}
function esModerador(){
    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil']=='P002')
        return true;
    }
    return false;
}