<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
                    $ciudad=explode("%",$provincia);
                    if($ciudad[0]=="Le"){
                        echo "<h3>León</h3>";
                    }else{
                        echo "<h3>".$ciudad[0]."</h3>";
                    }
                    echo "\tCódigo de ciudad: ".$value."<br>";
                    $claveCiudad=$value;
                }
                if($key=="GeoPosition"){
                    echo "\tGeoposición:<br>";
                    echo "\t\tLatitud: ".$value['Latitude']."<br>";
                    echo "\t\tLongitud: ".$value['Longitude']."<br><br>";
                }
        }           
    }
    echo "<h3>Pronóstico para los próximos 5 días</h3>";
    $url= "http://dataservice.accuweather.com/forecasts/v1/daily/5day/".intval($claveCiudad)."?apikey=AxBnlHl2k20UxqNrgg554CqdNUhw6FaX&language=es-ES";
    $datos = file_get_contents($url);
    if($datos){
        $array = json_decode($datos,true);
        
        foreach($array as $key => $value){

            if($key=="DailyForecasts"){
                echo '<table class="table text-center">';
                echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col">Fecha</th>';
                    echo '<th scope="col">TªMIN (grados)</th>';
                    echo '<th scope="col">TªMAX (grados)</th>';
                    echo '<th scope="col">Información durante el día</th>';
                    echo '<th scope="col">LLuvia durante el día</th>';
                    echo '<th scope="col">Información durante la noche</th>';
                    echo '<th scope="col">LLuvia durante la noche</th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
                   
                foreach($value as $clave => $valor){

                    echo '<tr class="text-center">';
                    $fecha=substr($valor["Date"],0,10);
                    echo "<td>".$fecha."</td>";
                  

                    if($valor["Temperature"]){
                        foreach($valor["Temperature"] as $k => $v){
                            if($k=="Minimum"){
                                $grados=intval(($v["Value"]-32) * 5/9);
                                 echo "<td>". $grados."</td>";
                            }
                            if($k=="Maximum"){
                                $grados=intval(($v["Value"]-32) * 5/9);
                                echo "<td>". $grados."</td>";
                           }
                        }
                    }
                    if($valor["Day"]){
                        foreach($valor["Day"] as $k => $v){
                            if($k=="IconPhrase"){
                                echo "<td>".$v."</td>";
                            }
                            if($k=="HasPrecipitation"){
                                if($v){
                                    echo "<td>".$v."</td>";
                                }else{
                                    echo "<td>No</td>";
                                }
                            }
                            
                        }
                    }
                    if($valor["Night"]){
                        foreach($valor["Night"] as $k => $v){
                            if($k=="IconPhrase"){
                                echo "<td>".$v."</td>";
                            }
                            if($k=="HasPrecipitation"){
                                if($v){
                                    echo "<td>".$v."</td>";
                                }else{
                                    echo "<td>No</td>";
                                }
                                
                            }
                        }
                    }
                echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }
        }           
    }
?>

