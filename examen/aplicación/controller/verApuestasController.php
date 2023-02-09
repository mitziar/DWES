<?php
    if(isset($_REQUEST['generar'])){
        //LLAMAMOS A LA API
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_URL, "http://192.168.100.127/DWES/examen/api/sorteos.php/sorteo");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json );
        $data = curl_exec($ch);
        if($data){
            echo "<br>Los números premiados en el sorteo son:<br>";
            print_r($data);
        
        curl_close($ch);
    }
}
?>