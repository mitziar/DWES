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
        foreach($array[0] as $key => $value){

                if($key=="Key"){
                    echo " Zamora clave: ".$value."<br>";
                }
                if($key=="GeoPosition"){
                    echo " Geoposicion:<br>";
                    echo "  Latitude:".$value['Latitude']."<br>";
                    echo "  Longitude:".$value['Longitude']."<br>";
                }
        }           
    }
?>

