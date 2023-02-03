<?
function get(){
    $ch = curl_init();//le puedo pasar url o luego como variable de las opcines
    
    $url= 'http://192.168.2.205/ServidorClase/Tema7/api/conciertos.php/conciertos';
    
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $resultado = curl_exec($ch);

    curl_close($ch);

    return $resultado;

}
function post($grupo,$fecha,$precio,$lugar){
    $json= '{
        "grupo": "'.$grupo.'",
        "fecha": "'.$fecha.'",
        "precio": "'.$precio.'",
        "lugar": "'.$lugar.'"
    }';

    $ch = curl_init();//le puedo pasar url o luego como variable de las opcines
    
    $url= 'http://192.168.2.205/ServidorClase/Tema7/api/conciertos.php/conciertos';
    
    
    //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);NO NECESITO QUE DEVUELVA
    
    curl_setopt($ch,CURLOPT_HTTPHEADER,
    'Content-Type:aplication/json');

    curl_setopt($ch,CURLOPT_POST,1);
    
    curl_setopt($ch,CURLOPT_POSTFIELDS,$json);

    $resultado = curl_exec($ch);
    
    curl_close($ch);

    return $resultado;

}