<?php
/*
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://192.168.2.205/ServidorClase/Tema7/api/conciertos.php/conciertos");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
print_r($res);
curl_close($ch);
*/


$json = '{
    "fecha": "2025-04-05",
    "precio": 25,
    "grupo": "Mago de Oz",
    "lugar": "Palacio de las Artes, Valencia"
}';
//$fields = array($json);
//$fields_string = http_build_query($fields);
$ch = curl_init();
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_URL, "http://192.168.2.200/tema7/api/conciertos.php/conciertos");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json );
$data = curl_exec($ch);
print_r($data);
curl_close($ch);

/*
$fields = array( 'descUsuario'=> 'curlput', 'password'=>'curl' );
$fields_string = json_encode($fields);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/api/miapi/usuarios/curl");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($fields_string)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
print_r($data);
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/api/miapi/usuarios/curl");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);

*/