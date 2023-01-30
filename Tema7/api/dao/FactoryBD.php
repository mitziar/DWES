<?
require_once './configuracion/conexion.php';

Class FactoryBD{
    public static function ejecuta($sql,$datos){
        try{
            $con = new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
            $preparada = $con->prepare($sql);
            $preparada->execute($datos);       
        }catch(Exception $e){
            $preparada = null;
            echo $e;//podemos lanzar aqui un throw por si se cae           
        }finally{
            unset($con);
            return $preparada;
        }
    }
}