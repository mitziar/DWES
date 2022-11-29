<?php
function comprobarNombre(){
    $patron = '/^[A-Z][a-z]{2,}\s[A-Z][a-z]{2,}\s[A-Z][a-z]{2,}$/';
    if(preg_match($patron,$_REQUEST['nombre'])){
        return true;
    }
    return false;
}
function compExp(){
    $patron = '/^[0-9]{2}[A-Z]{3}[A-Z]\/[0-9]{2}$/';
    if(preg_match($patron,$_REQUEST['nombre'])){
        return true;
    }
    return false;
}
function rellenar($array){
    foreach($array as $elementos => $value){
        echo "<option value='".$elementos."'>".$elementos."</option>";
    }
}

function rellenarCheck($array){
    foreach($array as $elementos => $valor){
        if($elementos == $_REQUEST['curso']){
            foreach ($valor as $value) {
                echo "<input type='checkbox' name='check[]' id='".$value."'value='".$value."'>";
                echo "<label for='".$value."'>".$value."</label>";
            }
        }
        
    }
}

function primeraValidacion(){
    if(enviado()){
        if(!vacio('nombre') && comprobarNombre()){
            if(!vacio('exp') && compExp())
            { 
                if($_REQUEST['curso']!="no"){
                    return true;
                }
            }  
        }
    }
    return false;
}
function enviado(){
    if(isset($_REQUEST['Enviado'])){
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