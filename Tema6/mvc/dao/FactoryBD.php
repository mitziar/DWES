<?
/**
*Patron de diseño que se usa en este caso para las conexiones de la base de datos
*/


//require_once('')no lo usa, dará fallo en el futuro.
Class FactoryBD{
    public static function ejecuta($sql,$datos){
        //sql: llevara la consutla
        //datos: lñleva los datos de la consulta
        try{
                $conexion = new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
                $preparada= $conexion -> prepare($sql);
                $preparada->execute($datos);//LOS DATOS VAN COMO ARRAY


        }catch (Exception $e){
                $preparada = null;//Devuelve nulo si hay error
                echo $e;
                unset($con);
        }finally{

                unset($con);
                return $preparada;
        }
    }
}




?>