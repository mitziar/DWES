<?php

function ejecutarScript(){
    try{
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'],'itziar','itziar');//Creamos objeto de tipo pdo
        $script = file_get_contents('../scriptInicial.sql');
        $resultado=$conexion->exec($script);
        if($resultado!=false){
           unset($conexion);
            return true; 
        }else{
            unset($conexion);
            return false; 
        }
        
    }catch(Exception $errores){
        unset($conexion);
        return obtenerMensajeError($errores);
    }
}
function usarBaseDatos($nombreBD){
    $sentencia='use '.$nombreBD;
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname=','itziar','itziar');//Creamos objeto de tipo pdo
        $resultado=$conexion->exec($sentencia);
        if($resultado!=false){
           unset($conexion);
            return true; 
        }else{
            unset($conexion);
            return false; 
        }
        
    }catch(Exception $errores){
        unset($conexion);
        return false;
    }
}
function existeUser($user)
{
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "select * from usuarios where usuario = ? ";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $array = array($user);
        $sql_p->execute($array);

        if($sql_p->rowCount()==1){
            unset($conexion);
            return true;
        }else{
            unset($conexion);
            return false;
        }

    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}

function validaUser($user,$pass){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "select * from usuarios where usuario = ? and contraseña = ?";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
       $pass_e = sha1($pass);
       //$pass_e = $pass;
        $array = array($user,$pass_e);
        $sql_p->execute($array);

        
        if($sql_p->rowCount()==1){
            //si devuelve algo hacemos el login 
            //iniciamos sesision
            //session_start();//se puede hacer en casi todas las páginas, sabe si hemos conectado en una ocasión anterior. No tengo login
            $_SESSION['validado'] = true;//creamos la variable para que sepamos que ha hecho login

            //si entra por aquí va a existir una fila $row
            $row = $sql_p->fetch();
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] =$row['usuario'];
            $_SESSION['perfil'] =$row['codigo'];

            unset($con);
            return true;
        }else{
            //sino no hay login
            unset($con);
            return false;
        }   
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($con);
    }
}
function mostrarProductos(){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "select * from productos";

        $resultado = $conexion->query($sql);
        $rows = $resultado->fetchAll();
        if ($resultado!=false){                    
            unset($conexion);
            return $rows; 
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}

function altaUsuario($user,$pass,$email,$fecha){
    try{
        //$conexion= new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "insert into usuarios(usuario,contraseña,email,fecha,codigo) values (?,?,?,?,1)";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
       $pass_e = sha1($pass);//encriptamos contraseña
        $array = array($user,$pass_e,$email,$fecha);
        $sql_p->execute($array);

        if($sql_p!=false){

            session_start();
            $_SESSION['validado'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['perfil'] =3;

            unset($conexion);
            return true;
        }else{
            //sino no hay login
            unset($conexion);
            return false;
        }
        
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function editarUsuario($user,$pass,$email,$fecha){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "update usuarios set contraseña=?,email=?,fecha=? where usuario ='".$user."'";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $pass_e = sha1($pass);//encriptamos contraseña
        $array = array($pass_e,$email,$fecha);
        $resultado=$sql_p->execute($array);

        
        if($resultado!=false){

            unset($conexion);
            return true;
        }else{
            //sino no hay login
            unset($conexion);
            return false;
        }
        
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}

function obtenerUser($user)
{
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "select * from usuarios where usuario = ? ";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $array = array($user);
        $sql_p->execute($array);

        if($sql_p->rowCount()==1){
            $fila=$sql_p->fetch();
            unset($conexion);
            return $fila;
        }else{
            unset($conexion);
            return false;
        }

    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function obtenerProducto($codigoProducto)
{
    try{
        $producto=intval($codigoProducto);
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "select * from productos where codigo = ? ";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $array = array(intval($producto));
        $sql_p->execute($array);


        if($sql_p->rowCount()==1){
            $fila=$sql_p->fetch();
            unset($conexion);
            return $fila;
        }else{
            unset($conexion);
            return false;
        }

    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function obtenerStock($codigoProducto){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $resultado=$conexion->query('select stock from productos where codigo="'.$codigoProducto.'"');
        if($resultado!=false){
            $stock=$resultado->fetchColumn();
            unset($conexion);
            return $stock;
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
    
}
function verVentas($usuario){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        
        if($_SESSION['perfil']==1 || $_SESSION['perfil']==2){
            $sql = "select * from venta";
        }else{
            $sql = "select * from venta where usuario='".$usuario."'";
        }
        
        $resultado = $conexion->query($sql);
        $rows = $resultado->fetchAll();
        if ($resultado!=false){                    
            unset($conexion);
            return $rows; 
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function verVenta($id){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        
        $sql = "select * from venta where id='".$id."'";
       
        
        $resultado = $conexion->query($sql);
        $row = $resultado->fetch();
        if ($resultado!=false){                    
            unset($conexion);
            return $row; 
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function borrarVenta($id){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        
        $sql = "delete from venta where id='".$id."'";

        $resultado = $conexion->exec($sql);
        if ($resultado!=false){                    
            unset($conexion);
            return true; 
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function modificarVenta($id,$fecha,$cantidad,$precio,$producto,$usuario){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "update venta set fecha=?,cantidad=?,precio=?,producto=?,usuario=? where id =".$id;
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $array = array($fecha,$cantidad,$precio,$producto,$usuario);
        $resultado=$sql_p->execute($array);

        
        if($resultado!=false){

            unset($conexion);
            return true;
        }else{
            //sino no hay login
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function verAlbaran($id){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        
        $sql = "select * from albaran where codigo='".$id."'";
       
        
        $resultado = $conexion->query($sql);
        $row = $resultado->fetch();
        if ($resultado!=false){                    
            unset($conexion);
            return $row; 
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function insertarProducto($nombre,$descripcion,$precio,$stock,$ruta){
    try{
        //$conexion= new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "insert into productos(nombre,descripcion,precio,stock,ruta) values (?,?,?,?,?)";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        if($ruta==null){
            $ruta='imagenPorDefecto.png';
        }
        $array = array($nombre,$descripcion,$precio,$stock,$ruta);
        $sql_p->execute($array);

        if($sql_p!=false){

            unset($conexion);
            return true;
        }else{
            //sino no hay login
            unset($conexion);
            return false;
        }
        
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function transaccionModificarProducto($codigo,$stock){
    try{
        $fecha=  date('Y-m-d');
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'],'itziar','itziar', 'tienda');
        mysqli_autocommit($conexion, false);
       
        $sql1='update productos set stock='.$stock.' where codigo = '.$codigo;
        $sql='insert into albaran (fecha,cantidad,producto,usuario) values("'.$fecha.'",'.$stock.','.intval($codigo).',"'.$_SESSION['user'].'")';
        mysqli_query($conexion, $sql);
        mysqli_query($conexion, $sql1);
        mysqli_commit($conexion);
        mysqli_close($conexion);
        return true;
    
     }catch (Exception $ex){
        echo obtenerMensajeError($ex);
        mysqli_rollback($conexion);
        mysqli_close($conexion);
        return obtenerMensajeError($ex);
    }
}
function modificarProducto($codigo,$nombre,$descripcion,$precio,$stock){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "update productos set nombre=?,descripcion=?,precio=?,stock=? where codigo =".intval($codigo);
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $array = array($nombre,$descripcion,$precio,$stock);
        $resultado=$sql_p->execute($array);

        
        if($resultado!=false){

            unset($conexion);
            return true;
        }else{
            //sino no hay login
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function verAlbaranes(){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        
        $sql = "select * from albaran";
      
        
        $resultado = $conexion->query($sql);
        $rows = $resultado->fetchAll();
        if ($resultado!=false){                    
            unset($conexion);
            return $rows; 
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function borrarAlbaran($id){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        
        $sql = "delete from albaran where codigo='".$id."'";

        $resultado = $conexion->exec($sql);
        if ($resultado!=false){                    
            unset($conexion);
            return true; 
        }else{
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function modificarAlbaran($id,$fecha,$cantidad,$producto,$usuario){
    try{
        $conexion = new PDO("mysql:host=".$_SERVER['SERVER_ADDR'].";dbname=tienda",'itziar','itziar');
        $sql = "update albaran set fecha=?,cantidad=?,producto=?,usuario=? where codigo =".$id;
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $array = array($fecha,$cantidad,$producto,$usuario);
        $resultado=$sql_p->execute($array);

        
        if($resultado!=false){

            unset($conexion);
            return true;
        }else{
            //sino no hay login
            unset($conexion);
            return false;
        }
    }catch(Exception $ex){
        echo obtenerMensajeError($ex);
        unset($conexion);
    }
}
function transaccionVenta($codigoProducto,$precio,$udStock,$codigoUsuario,$cantidad){
    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'],'itziar','itziar', 'tienda');
        mysqli_autocommit($conexion, false);
       
        $stock=$udStock-$cantidad;
        if($stock>=0){
            $fecha=  date('Y-m-d');
        
            $sql1='update productos set stock='.$stock.' where codigo = '.$codigoProducto;
            $sql='insert into venta(fecha,cantidad,precio,producto,usuario) values("'.$fecha.'",'.$cantidad.','.doubleval($precio).','.intval($codigoProducto).',"'.$codigoUsuario.'")';
            mysqli_query($conexion, $sql);
            mysqli_query($conexion, $sql1);
            mysqli_commit($conexion);
            mysqli_close($conexion);
            return true;
        }else{
            mysqli_close($conexion);
            $_SESSION['error']='No hay stock suficiente';
            return false;
        }
        
    
     }catch (Exception $ex){
        echo obtenerMensajeError($ex);
        mysqli_rollback($conexion);
        mysqli_close($conexion);
        return obtenerMensajeError($ex);
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
        case 2002:
            $mensaje = "No se puede conectar al servidor";
            break;
       default:
            $mensaje= $excepcion->getCode()." ".$excepcion->getMessage();
           break;
   }
   return $mensaje;
 }
