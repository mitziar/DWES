<?php
require './seguro/conexion.php';
/**
 * Ejecuta el script con las sentencias para crear la BD 'alumnos',
 * la tabla 'notas' e inserta 10 registros en 'notas'.
 * @return 'ok' si todo ha ido bien.
 * @return false si no ha ido bien.
 **/
function ejecutarScript(){
    try{
        $conexion = new PDO('mysql:host='.HOST,USER,PASS);//Creamos objeto de tipo pdo
        $script = file_get_contents('./notasAlumnos.sql');
        $resultado = $conexion->query($script);
        if ($resultado!=false){
            return 'ok';
        }
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }finally{
        //cerrar conexion
        unset($conexion);
        return 'ok';
    }
}
/**
 * Ejecuta la sentencia para crear la BD.
 * @param $nombreBD string con el nombre de la BD
 * @return true si crea la BD.
 * @return false si no crea la BD.
 **/
function crearBaseDatos($nombreBD){
    $sentencia="CREATE DATABASE IF NOT EXISTS ".$nombreBD;
    try {
        $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
        $resultado = $conexion->query($sentencia);
        if ($resultado!=false){
            return true;
        }
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }finally{
        //cerrar conexion
        unset($conexion);
    }
}
/**
 * ejecuta use $nombreBD para poder trabajar con la base de datos
 * @return string 'ok'|'mensaje de error'
 */
function usarBaseDatos($nombreBD){
    $sentencia='use '.$nombreBD;
    try {
        $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
        $resultado = $conexion->query($sentencia);
        if ($resultado!=false){
            return true;
        }

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }finally{
        //cerrar conexion
        unset($conexion);
    }
}
/**
 * crearTabla
 */
 function crearTabla($nombreTabla,$campos,$nombreBaseDatos){

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
        $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
        $resultado = $conexion->query($sentencia);
        if ($resultado!=false){
            return true;
        }

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }finally{
        //cerrar conexion
        unset($conexion);
    }
 }
 /**
 * Obtiene todos los registros de la tabla y la base de datos
 * @return array con las filas obtenidas
 * @return string de error
 */
function obtenerTodosRegistros($nombreTabla,$nombreBaseDatos){

    $sentencia="Select * from ".$nombreTabla.";";

    try{
        
        $filas= array();
        $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
        $resultado = $conexion->query($sentencia);
        if ($resultado!=false){
            while($row = $resultado->fetch(PDO::FETCH_BOTH)){
                array_push($filas,$row);
            }
            return $filas; 
        }

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }finally{
        //cerrar conexion
        unset($conexion);
    }
 }
 /**
  * Obtiene las cabeceras de la tabla
  */
 function obtenerCabeceraTabla($nombreTabla){
    
    $sentencia="Desc ".$nombreTabla;

    try{
        
        $filas= array();
        $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
        $resultado = $conexion->query($sentencia);
        if ($resultado!=false){
            while($row = $resultado->fetch(PDO::FETCH_BOTH)){
                array_push($filas,$row);
            }
            return $filas; 
        }

    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }finally{
        //cerrar conexion
        unset($conexion);
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

    $sql="select * from ".$nombreTabla." where ".$nombreCampo." LIKE ? ";

     try{
        
        $filas= array();
        $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
        $preparada= $conexion->prepare($sql);
        $preparada->execute($valorCampo);
        $resultado = $preparada->fetchAll();

        if ($resultado!=false){
            foreach($resultado as $key => $value){
                array_push($filas,$value);
            }
            return $filas; 
        }
    }catch(Exception $errores){
        return obtenerMensajeError($errores);
    }finally{
        //cerrar conexion
        unset($conexion);
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

        $sql="select * from ".$nombreTabla." where id = ? ";
        try{
        
            $filas= array();
            $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
            $preparada= $conexion->prepare($sql);
            $preparada->execute([$valorCampo]);
            $resultado = $preparada->fetchAll();
    
            if ($resultado!=false){
                foreach($resultado as $key => $value){
                    array_push($filas,$value);
                }
                return $filas; 
            }
        }catch(Exception $errores){
            return obtenerMensajeError($errores);
        }finally{
            //cerrar conexion
            unset($conexion);
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
 function insertarRegistro($nombreTabla,$nombreBaseDatos,$valores,$tipoDatos){

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
  * Actualiza todos los valores de un registro en la tabla indicada de la base de datos indicada segun el campo indicado
  * @return true|false si ha actualizado. si no ha actualizado
  */
  function actualizarRegistroPorCampo($nombreTabla,$nombreBaseDatos,$nombreCampo,$valorCampo,$valores,$tipoDatos){
    
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
        
                $filas= array();
                $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
                $preparada= $conexion->prepare($sentencia);
                $preparada->execute($valores);
                $resultado = $preparada->fetchAll();
        
                if ($resultado!=false){
                    foreach($resultado as $key => $value){
                        array_push($filas,$value);
                    }
                    
                    return $filas; 
                }
            }catch(Exception $errores){
                return obtenerMensajeError($errores);
            }finally{
                //cerrar conexion
                unset($conexion);
                if ($resultado!=false){
                    foreach($resultado as $key => $value){
                        array_push($filas,$value);
                    }
                    if(empty($filas)){
                        return true; 
                    }
                    
                }
            }  
    }
    
}

/**
 * Elimina un registro por 'id'.
 * @param $id identificador del registro a borrar
 * @return true si elimina el registro
 * @return false si no elimina el registro
 */
 function eliminarRegistro($id,$nombreTabla){

        $sentencia="Delete from ".$nombreTabla." where id=?";
        try{
        
            $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
            $preparada= $conexion->prepare($sentencia);
            $preparada->execute([$id]);
            $resultado = $preparada->fetchAll();     
        }catch(Exception $errores){
            return obtenerMensajeError($errores);
        }finally{
            //cerrar conexion
            unset($conexion);
            if (empty($resultado)){
                return true; 
            }
        } 
    } 
 /**
  * Elimina la base de datos
  * @param $nombreBBDD string con el nombre de la base a eliminar.
  * @return true si elimina la base de datos
  * @return false si no elimina la base de datos
  **/
 function eliminarBaseDatos($nombreBBDD){

        $sentencia="drop database ?";
        try{
        
            $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
            $preparada= $conexion->prepare($sentencia);
            $preparada->execute($nombreBBDD);
            $resultado = $preparada->fetchAll();
    
            if (empty($resultado)){
                return true; 
            }
        }catch(Exception $errores){
            return obtenerMensajeError($errores);
        }finally{
            //cerrar conexion
            unset($conexion);
            if (empty($resultado)){
                return true; 
            }
        }  
 }

 function eliminarTabla($nombreBBDD,$nombreTabla){
  
        $sentencia="drop table ?";
        try{

            $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo
            $preparada= $conexion->prepare($sentencia);
            $preparada->execute($nombreTabla);
            $resultado = $preparada->fetchAll();
    
            if (empty($resultado)){
                return true; 
            }
        }catch(Exception $errores){
            return obtenerMensajeError($errores);
        }finally{
            //cerrar conexion
            unset($conexion);
            if (empty($resultado)){
                return true; 
            }
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
        case 1064 || "HY093":
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