<?

require './seguro/conexion.php';

//conexion 
try {
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,
                USER,PASS);
    //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
    echo "Conexion correcta";
    $sql= "select * from equipo";
    $resultado = $conexion->query($sql);
    echo "<br>Numero Equipos: " .$resultado->rowCount();
    while($row = $resultado->fetch(PDO::FETCH_BOTH)){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }


    /**INSERT */
    //$sql= "insert into equipo values(8,'Suiza')";

    $sql= "insert into equipo values(9,'Suiza'),(109,'Alemania')";
    $numero = $conexion->exec($sql);
    echo "<br> se ha insertado: ".$numero;

} catch (PDOException $ex) {
    echo "Error:";
    print_r($ex);
}finally{
    unset($conexion);
}