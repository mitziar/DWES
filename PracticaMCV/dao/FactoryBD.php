<?

Class FactoryBD{
    public static function ejecuta($sql,$datos){
        try{
            $con = new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
            $preparada = $con->prepare($sql);
            $preparada->execute($datos);       
        }catch(Exception $e){
            $preparada = null;
            echo $e;           
        }finally{
            unset($con);
            return $preparada;
        }
    }
    public static function ejecutaTransacion($sql){
        
            try{
                $conexion = mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                mysqli_autocommit($conexion, false);
               
                foreach ($sql as $key => $value) {
                    mysqli_query($conexion, $value);
                }

                mysqli_commit($conexion);
                mysqli_close($conexion);
                return true;
            
             }catch (Exception $ex){
                echo $ex;
                mysqli_rollback($conexion);
                mysqli_close($conexion);
                return false;
            }
    }
    public static function ejecutarScript(){
        try{
            $conexion = new PDO("mysql:host=".HOST,USER,PASS);
            $script = file_get_contents('./scriptDatos.sql');
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
            return false;
        }
    }
    public static function existeDB(){
        $sql = 'use tienda';
        try{
            $con = new PDO("mysql:host=".HOST,USER,PASS);
            $preparada = $con->prepare($sql);
            $devuelve=$preparada->execute();
            if($devuelve){
                unset($con);
                return true;
            }
            unset($con);
            return false;      
        }catch(Exception $e){
            unset($con);
            return false;            
        }
    }
}