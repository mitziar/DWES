<?php

    if($sorteo=SorteoDao::findByFecha(date("Y-m-d"))){
        $_SESSION['pagina'] = 'sorteado';
        $_SESSION['vista'] = $vistas['sorteado'];
        echo "Ya se ha celebrado el sorteo, vuelve y apuesta mañana <br>";
        if($sorteo){
            Echo "<br>Los numero premiados:".$sorteo->n1."-".$sorteo->n2."-".$sorteo->n2."-".$sorteo->n4."-".$sorteo->n5."";
        }
        if($apuesta=ApuestaDao::findByUserHoy($_SESSION['user'])){
            echo "<br>Tu apuesta: ".$apuesta->n1."-".$apuesta->n2."-".$apuesta->n2."-".$apuesta->n4."-".$apuesta->n5."";
        }
    }elseif($apuesta=ApuestaDao::findByUserHoy($_SESSION['user'])){
        //como no entra por el primero, no hay sorteo, conque si tiene apuestas puede modificar
        echo "Tu apuesta:".$apuesta->n1." ".$apuesta->n2." ".$apuesta->n3." ".$apuesta->n4." ".$apuesta->n5." ";
        $_SESSION['pagina'] = 'modificar';
        $_SESSION['vista'] = $vistas['modificar'];
    }elseif(isset($_REQUEST['insertar'])){
        if(count($_REQUEST['numero'])<5){
        echo "Debe introducir 5 numeros";
        }else{
        $apuesta=new Apuesta(null,date("Y-m-d"),$_SESSION['user'],$_REQUEST['numero'][0],$_REQUEST['numero'][1],$_REQUEST['numero'][2],$_REQUEST['numero'][3],$_REQUEST['numero'][4]);
        $resultado=ApuestaDao::insert($apuesta);
        if(!$resultado){
            echo "No se ha guardado la apuesta";
         }
      }
    }


if(isset(($_REQUEST['modificar']))){

    if(!isset($_REQUEST['numero']) || count($_REQUEST['numero'])<5){
            echo "<br>Debe introducir 5 numeros";
    }else{
        $apuesta=new Apuesta(null,date("Y-m-d"),$_SESSION['user'],$_REQUEST['numero'][0],$_REQUEST['numero'][1],$_REQUEST['numero'][2],$_REQUEST['numero'][3],$_REQUEST['numero'][4]);
        $resultado=ApuestaDao::update($apuesta);
        if(!$resultado){
            echo "No se ha modificado la apuesta";
        }else{
            echo "Apuesta modificada";
        }
        $_SESSION['pagina'] = 'modificar';
        $_SESSION['vista'] = $vistas['modificar'];
        require_once $_SESSION['controlador'];
    }
}

    

?>