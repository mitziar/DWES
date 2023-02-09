<?
require_once './configuracion/conexion.php';

Class FactoryBD{
    public static function ejecuta($sql,$datos){
        try{           
            $con = new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $preparada = $con->prepare($sql);
            $preparada->execute($datos);       
        }catch(Exception $e){            
            $preparada = null;            
            if($e->getCode() == 2002 || $e->getCode() == 1049){
                ControladorPadre::respuesta('',
                array('HTTP/1.1 500 Server Error'));
            }else{
                ControladorPadre::respuesta('',
                array('HTTP/1.1 400 Alguno de los parametros estan mal' .$e->getMessage()));
            }        
        }finally{
            unset($con);
            return $preparada;
        }
    }
}