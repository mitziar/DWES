<?php

    
    $url= "http://dataservice.accuweather.com/locations/v1/cities/search?apikey=AxBnlHl2k20UxqNrgg554CqdNUhw6FaX&q=Zamora&language=es-ES";
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
