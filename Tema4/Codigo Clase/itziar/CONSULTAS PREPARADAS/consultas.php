<?

require './seguro/conexion.php';

//conexion 
try {
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,
                USER,PASS);
    //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
    echo "Conexion correcta";
    


    /**INSERT */

    $sql= "insert into equipo values(?,?)";
    $preparada = $conexion->prepare($sql);

    $id= 11;
    $nombre= 'Rumania';

    $preparada->bindParam(1,$id);
    $preparada->bindParam(2, $nombre);
    $preparada->execute();
   

} catch (PDOException $ex) {
    echo "Error:";
    print_r($ex);
}finally{
    unset($conexion);
}