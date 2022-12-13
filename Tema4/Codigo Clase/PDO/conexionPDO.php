<?php
/**Puedo usar la misma conexion */
require('./seguro/conexion.php');
try{

    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);//Creamos objeto de tipo pdo y le paso

    echo 'conexión correcta';

    /**Atributos del objeto PDO que nos dan información **/
    // echo $conexion->getAttribute(PDO::ATTR_SERVER_INFO).'<br>';
    // echo $conexion->getAttribute(PDO::ATTR_SERVER_VERSION).'<br>';
    // echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION).'<br>';


    $sql = 'Select * from equipo';


    $resultado = $conexion->query($sql);

    echo "<br>numero de equipos: " . $resultado->rowCount();
    
    while($row = $resultado->fetch(PDO::FETCH_BOTH)){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }

}catch(Exception $ex){
    echo 'Error:';
    print_r($ex);
}finally{
    //cerrar conexion
    unset($conexion);
}


?>