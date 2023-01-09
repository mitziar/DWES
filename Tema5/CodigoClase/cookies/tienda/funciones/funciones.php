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
        print_r($conexion);
        unset($conexion);
        return $false;
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
            $array= $devuelve -> fetchAll(PDO::FETCH_ASSOC);
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

?>