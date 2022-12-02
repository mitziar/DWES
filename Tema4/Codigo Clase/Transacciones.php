<?php
require './seguro/conexion.php';
/**
 * Transacciones:
 */
try{
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS, 'mundial');
    mysqli_autocommit($conexion, false);
    // * aqui insertar 3 equipos a la vez, pero el ultimo error porque le doy pk mal 
    $sql='insert into equipo values(4,\'Alemania\')';
    $sql1='insert into equipo values(5,\'Rusia\')';
    $sql2='insert into equipo values(5,\'Brasil\')';

    mysqli_query($conexion, $sql);
    mysqli_query($conexion, $sql1);
    mysqli_query($conexion, $sql2);
    mysqli_commit($conexion);

 }catch (Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
    echo $ex->getMessage();
    mysqli_rollback($conexion);
}finally{
    mysqli_close($conexion);
}