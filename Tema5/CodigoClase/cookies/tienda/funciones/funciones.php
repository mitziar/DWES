<?php


//findAll: devuelve todos los productos
function findAll(){//controlador mysql

    try{
        $conexion= new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
        $sql="select * from producto";
        $devuelve = $conexion->query($sql);
        $array= $devuelve -> fetchAll(PDO::FETCH_ASSOC);
        unset($conexion);
        return $array;
    }catch(Exception $Ex){
        //print_r($conexion);
        unset($conexion);
        return false;
    }
}
//findById: devuelve uno solo para ver
function findById($id){
    try{
        $conexion= new PDO("mysql:host=".HOST.";dbname=".BBDD,USER,PASS);
        $sql="select * from producto where codigo = ?";
        $prepare = $conexion->prepare($sql);
        $devuelve = $prepare->execute(array($id));
        
        if($devuelve!=false){
            $array= $prepare -> fetchAll();
            unset($conexion);
            return $array;
        }else{
            unset($conexion);
            return false;
        }
        
    }catch(Exception $Ex){
        print_r($conexion);
        unset($conexion);
        return false;
    }
}
function mostrarUltimo(){
    if(isset($_COOKIE['visto'])){
        $array=$_COOKIE['visto'];
        $array=array_reverse($array);
        foreach ($array as $id) {
                $producto=findById($id);
                $producto=$producto[0];
                echo "<article class='card'>";
                echo "<a href='./verProducto.php=producto=".$producto['codigo']."'><img src='./webroot/".$producto['baja']."'></a>";
                echo "<p>".$producto['nombre']."</p>";
                echo "</article>";
        }     
    }
}
?>