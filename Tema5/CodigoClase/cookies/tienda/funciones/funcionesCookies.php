<?php
function productoVisto($id){
    //Si no existe ninguna cookie con ['visto] creamos el [0] (pueden existir otras cookies)
    if(!isset($_COOKIE['visto'])){
        setcookie('visto[0]',$id);
    }else{
        //nuestro array de vistos como max va a tener 3 elementos de vistos
        //si existe en el array
        $array=$_COOKIE['visto'];
        if(in_array($id,$array)){
                //quitar del array el valor $id
                $key=array_search($id,$array);
                unset($array[$key]);
                array_push($array,$id);
        }else{
            if(count($array)==3){
                unset($array[0]);
            }
            array_push($array,$id);//sobre array, no sobre cookie, hay que añadir a cookie
        }
        actualizar($array);
    }

}
function actualizar($array){
    $con=0;
    foreach ($array as $id) {
        //hago set cookie por  cada valor
        setcookie('visto['.$con.']',$id);
        $con++;
    }
}
?>