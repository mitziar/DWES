<?

require './seguro/conexion.php';

//conexion 
try {
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD,
                USER,PASS);
    //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
    echo "Conexion correcta";
    


    /**INSERT */

    // $sql= "insert into equipo values(?,?)";
    // $preparada = $conexion->prepare($sql);
    // $array=array(13,'Canada');
    // $preparada->execute($array);
   

    //aqui da igual el orden de los parametros
    /*
    $sql= "insert into equipo values(:id,:nombre)";
    $preparada = $conexion->prepare($sql);
    $array=array(":id"=>15, ":nombre"=>'Polonia');
    $preparada->execute($array);*/

    /**SELECT */

    $sql= "select * from equipo where id = :id";
    $preparada = $conexion->prepare($sql);
    $array=array(":id"=>1);
    $preparada->execute($array);


    /**INSERTAR EN VARIABLES */
    $preparada->bindColumn(1,$id);//El primer valor que me de lo inserta en $id
    $preparada->bindColumn(2,$nombre);
    while($row=$preparada->fetch(PDO::FETCH_BOUND)){
        ECHO "<br> ".$id." : ".$nombre;
    }

    ECHO "<br>Otro select"; 
    /**CONSULTA */
    $sql= "select * from equipo where nombre like :nombre";
    $preparada = $conexion->prepare($sql);
    $preparada->bindColumn(1,$id);//El primer valor que me de lo inserta en $id
    $preparada->bindColumn(2,$nombre);
    $array=array(":nombre"=>"%na%");
    $preparada->execute($array);

    while($row=$preparada->fetch(PDO::FETCH_BOUND)){
        ECHO "<br> ".$id." : ".$nombre;
    }

} catch (PDOException $ex) {
    echo "Error:";
    print_r($ex);
}finally{
    unset($conexion);
}