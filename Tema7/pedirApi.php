<?php

    $url= "https://datos.madrid.es/egob/catalogo/300600-0-comisaria.json?distrito_nombre=VILLAVERDE";
    $datos = file_get_contents($url);
    print_r($datos);
    //nos devulve un string.
    //Json en si, es texto plano
    

    //comprobamos si ha devuleto
    if($datos){
        $array = json_decode($datos,true);
        foreach($array['@graph'] as $value){
            //print_r($value);
            echo $value['title']."<br>";
            echo $value['location']['latitude']."<br>";
        }
    }

?>
