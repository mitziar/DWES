<?php

if(!file_exists('examen.xml')){
    //-1  LA CLASE. DOM 
        $dom = new DOMDocument("1.0","utf-8");
        //no deja la salida bonita
        $dom->formatOutput =  true;

        //2- CREAR RAIZ
        $raiz = $dom->createElement('examen.xml');

        //3-añadir la raiz al dom
        $dom->appendChild($raiz);

        //Crear etiquetas 
        $acceso = $raiz->appendChild($dom->createElement("acceso"));

        $acceso->appendChild($dom->createElement("ip"));
        $acceso->appendChild($dom->createElement("veces"));
        $acceso->appendChild($dom->createElement("fecha"));

        if($dom->save('examen.xml')){
            echo '<br> todo ok';
        }else{
            echo '<br> ERROR';
        }
    }
?>