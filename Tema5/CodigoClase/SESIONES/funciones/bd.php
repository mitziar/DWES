<?php
/**
 * Necesito:
 */
require("./seguro/conexion.php");
function validaUser($user,$pass){
    try{
        $conexion= new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
        $sql = "select * from usuarios usuario = ? and clave = ?";
        //preparo conexion
        $sql_p = $conexion->prepare($sql);
        $pass_e = sha1($pass);//encriptamos contraseña
        $array = array($user,$pass_e);
        $sql_p->execute();

        
        if($sql_p->rowCount()==1){
            //si devuelve algo hacemos el login 
            //iniciamos sesision
            session_start();//se puede hacer en casi todas las páginas, sabe si hemos conectado en una ocasión anterior. No tengo login
            $_SESSION['validado'] = true;//creamos la variable para que sepamos que ha hecho login

            //si entra por aquí va a existir una fila $row
            $row = $sql_p->fetch();
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] =$row['nombre'];
            $_SESSION['perfil'] =$row['perfil'];

            unset($con);
            return true;
        }else{
            //sino no hay login
            unset($con);
            return false;
        }
        
    }catch(Exception $ex){
        print_r($ex);
        unset($con);
    }
}