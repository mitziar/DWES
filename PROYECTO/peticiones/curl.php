<?php
function get($url)
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_URL,$url);

    $resultado = curl_exec($ch);

    curl_close($ch);

    return $resultado;
}
function post($json, $url)
{

    $ch = curl_init(); //le puedo pasar url o luego como variable de las opcines

    //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);NO NECESITO QUE DEVUELVA
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array('Content-Type:aplication/json')
    );

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

    $resultado = curl_exec($ch);

    curl_close($ch);

    return $resultado;
}

function put($json, $url)
{
    $ch = curl_init(); //le puedo pasar url o luego como variable de las opcines

    //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);NO NECESITO QUE DEVUELVA
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array('Content-Type:aplication/json')
    );

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

    $resultado = curl_exec($ch);

    curl_close($ch);

    return $resultado;
}
function delete($url)
{

    $ch = curl_init(); //le puedo pasar url o luego como variable de las opcines

    //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);NO NECESITO QUE DEVUELVA
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    $resultado = curl_exec($ch);

    curl_close($ch);

    return $resultado;
}
