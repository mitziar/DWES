<?php
require './seguro/conexion.php';
/**
 * Crear BASE DE DATOS
 * 
 */
function ejecutarScript(){
    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS);
        $script = file_get_contents('./notasAlumnos.sql');
        mysqli_multi_query($conexion, $script);
        mysqli_close($conexion);
        return 'ok';
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
}
function crearBaseDatos($nombreBD){
    $sentencia="CREATE DATABASE IF NOT EXISTS ".$nombreBD;
    try {
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS);
        $consulta_preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_preparada, $sentencia);
        mysqli_stmt_execute($consulta_preparada);
        mysqli_close($conexion);
        return true;

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
}
/**
 * ejecuta use $nombreBD para poder trabajar con la base de datos
 * @return string 'ok'|'mensaje de error'
 */
function usarBaseDatos($nombreBD){

    try {
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBD);
        $consulta_preparada = mysqli_stmt_init($conexion);
        mysqli_close($conexion);
        return 'ok';

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
}
/**
 * crearTabla
 */
 function crearTabla($nombreTabla,$campos,$nombreBaseDatos){
    // $nombreBaseDatos='alumnos';
    // $nombreTabla='notas';
    // $campos= array(
    //     'id' => 'int primary key',
    //     'nombre' => 'varchar(25)',
    //     'nota' =>  'DECIMAL (4, 2)',// 4 es el total de digitos, y 2 es el numero de digitos decimales
    //     'fecha' => 'date'/**formato YYYY-MM-DD */
    // );

    $i=1;
    $sentencia="CREATE TABLE ".$nombreTabla." (";
    foreach ($campos as $key => $value) {
        if(count($campos)>$i){
            $sentencia=$sentencia."".$key." ".$value.",";
        }else{
            $sentencia=$sentencia."".$key." ".$value.");";
        }
        $i++;
    }

    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBaseDatos);
        $consulta_preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_preparada, $sentencia);
        mysqli_stmt_execute($consulta_preparada);
        mysqli_close($conexion);
        return true;

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }
 /**
 * Obtiene todos los registros de la tabla y la base de datos
 * @return array con las filas obtenidas
 * @return string de error
 */
function obtenerTodosRegistros($nombreTabla,$nombreBaseDatos){
    // $nombreBaseDatos='alumnos';
    // $nombreTabla='notas';
    $sentencia="Select * from ".$nombreTabla.";";

    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBaseDatos);
        mysqli_stmt_init($conexion);
        $filas= array();
        if ($resultado = mysqli_query($conexion, $sentencia)) {
            while ($fila = mysqli_fetch_row($resultado)) {
                array_push($filas,$fila);
            }
        }
        mysqli_close($conexion);

        return $filas;
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }
 /**
  * Obtiene las cabeceras de la tabla
  */
 function obtenerCabeceraTabla(/**$nombreTabla,$nombreBaseDatos*/){
    $nombreBaseDatos='alumnos';
    $nombreTabla='notas';
    $sentencia="Desc ".$nombreTabla;

    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBaseDatos);
        mysqli_stmt_init($conexion);
        $filas= array();
        if ($resultado = mysqli_query($conexion, $sentencia)) {
            while ($fila = mysqli_fetch_row($resultado)) {
                array_push($filas,$fila);
            }
        }
        mysqli_close($conexion);
        return $filas;
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }

 /**
  * Devuelve los registros buscados por un campo
  * @param mixed $nombreTabla tabla en la que se va a buscar
  * @param mixed $nombreBaseDatos base de datos donde se encuentra la tabla en la que buscar
  * @param mixed $nombreCampo campor por el que se desea buscar
  * @param mixed $valorCampo valor que vamos a buscar.
  * @return array|string los registros de la consulta | mensaje de error
  */
 function obtenerRegistroPorCampo($nombreTabla,$nombreBaseDatos,$nombreCampo,$valorCampo){

    $resultados= array();

    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBaseDatos);
        $sql="select * from ".$nombreTabla." where ".$nombreCampo." LIKE ? ";
                
        $consulta_preparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_preparada,$sql);
             
        mysqli_stmt_bind_param($consulta_preparada,'s', $valorCampo);
        mysqli_stmt_execute($consulta_preparada);
        mysqli_stmt_bind_result($consulta_preparada,$r_id,$r_nombre,$r_nota,$r_fecha);
        while (mysqli_stmt_fetch($consulta_preparada)) {
            array_push($resultados,array($r_id,$r_nombre,$r_nota,$r_fecha));
        }

        mysqli_close($conexion);
        return $resultados;

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }  
 }
 /**
  * Obtiene el registro de la base de datos según el id que reciba.
  * @param mixed $nombreTabla tabla en la que se busca el registro
  * @param mixed $nombreBaseDatos base de datos donde está la tabla con el registro a buscar
  * @param mixed $valorCampo id del registro a buscar
  * @return array|string array con la fila del registro || mensaje de error en caso de que falle.
  */
 function obtenerRegistroPorId($nombreTabla,$nombreBaseDatos,$valorCampo){

    $resultados= array();

    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBaseDatos);
        $sql="select * from ".$nombreTabla." where id = ? ";
                
        $consulta_preparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_preparada,$sql);
             
        mysqli_stmt_bind_param($consulta_preparada,'i', $valorCampo);
        mysqli_stmt_execute($consulta_preparada);
        mysqli_stmt_bind_result($consulta_preparada,$r_id,$r_nombre,$r_nota,$r_fecha);
        while (mysqli_stmt_fetch($consulta_preparada)) {
            array_push($resultados,array($r_id,$r_nombre,$r_nota,$r_fecha));
        }

        mysqli_close($conexion);
        return $resultados;

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }  
 }
 /**
  * Obtiene el id mas alto que existe en la tabla de la base de datos que recibe como argumento
  * @return int entero con el id más alto
  */
 function obtenerUltimoId($nombreTabla,$nombreBaseDatos){

    $consulta='Select MAX(id) from '.$nombreTabla.";";

    try{
        $conexion=mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,$nombreBaseDatos);
        mysqli_stmt_init($conexion);
        $fila= array();
        if ($resultado = mysqli_query($conexion, $consulta)) {
            if ($fila = mysqli_fetch_row($resultado)) {
                mysqli_close($conexion);
                return $fila[0];
            }
        }else{
            mysqli_close($conexion);
            return null;
        }
        
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }
 function obtenerNumeroColumnas($nombreTabla,$nombreBaseDatos){

    $consulta='desc '.$nombreTabla.";";

    try{
        $conexion=mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,$nombreBaseDatos);
        mysqli_stmt_init($conexion);
        $filas= array();
        if ($resultado = mysqli_query($conexion, $consulta)) {
            while ($fila = mysqli_fetch_column($resultado)) {
                array_push($filas,$fila);
            }
            mysqli_close($conexion);
            return count($filas);
        }else{
            mysqli_close($conexion);
        }
        
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }
 /**
  * Inserta los valores pasados en la tabla indicada de la base de datos indicada
  * @return true si ha insertado el registro
  * @return false si no ha insertados el registro;
  */
 function insertarRegistro(/**$nombreTabla,$nombreBaseDatos,$valores,$tipoDatos*/){
    $nombreBaseDatos='alumnos';
    $nombreTabla='notas';
    $valores = array ('Carlos',8.25,'2022-03-26');
    $tipoDatos='sds';
    $idMaximo=obtenerUltimoId($nombreTabla,$nombreBaseDatos)+1;
    $numeroColumnas=obtenerNumeroColumnas($nombreTabla,$nombreBaseDatos)-1;

    if(count($valores)==$numeroColumnas){
        $sentencia= "insert into ".$nombreTabla." values (".$idMaximo.",";
        foreach($valores as $valor){
            if($numeroColumnas>1){
                 $sentencia=$sentencia." ?,";
                 $numeroColumnas--;
            }else{
                $sentencia=$sentencia." ?)";
            }
        }

        try{
            $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBaseDatos);
            $consulta_preparada= mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($consulta_preparada,$sentencia);
            echo $sentencia;     
            mysqli_stmt_bind_param($consulta_preparada,$tipoDatos, $valores[0],$valores[1],$valores[2]);
            mysqli_stmt_execute($consulta_preparada);
            mysqli_close($conexion);
           return true;
       }catch(Exception $errores){
        return obtenerMensajeError($errores);
       }
    }else{
        return false;//el numero de campos no coincide con el numero de columnas que tiene la tabla sin contar la columna id
    }
 }
 /**
  * Actualiza todos los valores pasados en la tabla indicada de la base de datos indicada segun el campo indicado
  * @return true si ha actualizado
  * @return false si no ha actualizado
  */
  function actualizarRegistroPorCampo(/**$nombreTabla,$nombreBaseDatos,$nombreCampo,$valorCampo,$valores,$tipoDatos*/){
    $nombreBaseDatos='alumnos';
    $nombreTabla='notas';
    $nombreCampo= 'nombre';
    $valorCampo='Carlos';
    $valores = array ('Carlos',10.00,'2022-03-30');
    $tipoDatos='sds';
    $numeroColumnas=obtenerNumeroColumnas($nombreTabla,$nombreBaseDatos)-1;
    $cabeceras=obtenerCabeceraTabla();
    $i=1;
    if(count($valores)==$numeroColumnas){
        $sentencia= "update ".$nombreTabla." set";
        foreach($valores as $valor){
            if($numeroColumnas>1){
                 $sentencia=$sentencia." ".$cabeceras[$i][0]."= ?,";
                 $i++;
                 $numeroColumnas--;
            }else{
                $sentencia=$sentencia." ".$cabeceras[$i][0]."= ? where ".$nombreCampo." = '".$valorCampo."'";

            }
        }
        try{
            $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBaseDatos);
            $consulta_preparada= mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($consulta_preparada,$sentencia);  
            mysqli_stmt_bind_param($consulta_preparada,$tipoDatos, $valores[0],$valores[1],$valores[2]);
            mysqli_stmt_execute($consulta_preparada);
            mysqli_close($conexion);
           return true;
       }catch(Exception $errores){
        return obtenerMensajeError($errores);
       }
    }else{
        return false;//el numero de campos no coincide con el numero de columnas que tiene la tabla sin contar la columna id
    }
 }

 function eliminarRegistro($id,$nombreTabla){
    try{

        $sentencia="Delete from ".$nombreTabla." where id=?";
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,'alumnos');
        $consulta_preparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_preparada,$sentencia);  
        mysqli_stmt_bind_param($consulta_preparada,'i', $id);
        mysqli_stmt_execute($consulta_preparada);
        mysqli_close($conexion);
        return true;
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }
 function eliminarBaseDatos($nombreBBDD){
    try{

        $sentencia="drop database ?";
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS);
        $consulta_preparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_preparada,$sentencia);  
        mysqli_stmt_bind_param($consulta_preparada,'s', $nombreBBDD);
        mysqli_stmt_execute($consulta_preparada);
        mysqli_close($conexion);
        return true;
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }

 function eliminarTabla($nombreBBDD,$nombreTabla){
    try{

        $sentencia="drop table ?";
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,$nombreBBDD);
        $consulta_preparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_preparada,$sentencia);  
        mysqli_stmt_bind_param($consulta_preparada,'s', $nombreTabla);
        mysqli_stmt_execute($consulta_preparada);
        mysqli_close($conexion);
        return true;
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }
 }

 function obtenerMensajeError($excepcion){
    switch ($excepcion->getCode()) {
        case 1007:
            $mensaje = "No se puede crear la base de datos. La base de datos ya existe";
            break;
        case 1046:
            $mensaje = "No se ha seleccionado BD";
            break;        
        case 1049:
            $mensaje = "Base de datos no existe";
            break;
        case 1050:
            $mensaje = "La tabla ya existe";
            break;
        case 1054:
            $mensaje = "Columna desconocida";
            break;
        case 1064:
            $mensaje = "Error sintaxis en la sentencia sql";
            break;
        case 1146:
            $mensaje = "No existe la tabla";
            break;
        case 1295:
            $mensaje="Comando no implementado en consultas preparadas";
            break;
        case 1396:
            $mensaje="Error al crear usuario";
            break;    
        case 2031:
            $mensaje="No se han suministrado los datos para la consulta";
            break;
       default:
            $mensaje= $excepcion->getCode()." ".$excepcion->getMessage();
           break;
   }
   return $mensaje;
 }
?>