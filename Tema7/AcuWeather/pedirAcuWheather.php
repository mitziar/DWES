<?php
    
    $provincia=$_REQUEST['provincia'];
    $url= "http://dataservice.accuweather.com/locations/v1/cities/search?apikey=AxBnlHl2k20UxqNrgg554CqdNUhw6FaX&q=".$provincia."&language=es-ES";
    $datos = file_get_contents($url);
    //print_r($datos);
    //nos devulve un string.
    //Json en si, es texto plano
    
    //comprobamos si ha devuleto
    if($datos){
        $array = json_decode($datos,true);

        /**
         * $key=$array[0]->"key";
         */
        foreach($array as $key => $value){
                echo $value;
                    if($key=="key"){
                        $key=$value;
                        echo $key." hio";
                    }                
            }           
           // echo $value['location']['latitude']."<br>";
        }
?>
//"GeoPosition":{"Latitude":42.342,"Longitude":-3.703,
//"Key":"307142"
