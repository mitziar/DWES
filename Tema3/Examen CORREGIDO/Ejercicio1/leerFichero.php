<?php
function Leer(){

    $dom = new DOMDocument();
    $dom->load('fichero.xml');
    
    
    //leer el raiz
    $raiz = $dom->childNodes[0];
    //Numero de hijos de la raiz
    //Recorrer los hijos
    foreach ($raiz->childNodes as  $elementos) {
        if($elementos->nodeType == 1){
            foreach ($elementos->childNodes as  $datos) {
                if($datos->nodeType == 1){
                    echo "<br>".$datos->nodeName.":". $datos->nodeValue;
                }
            }
    
        }
    }
}

function comprobarIP($ip,$fecha){

    $dom = new DOMDocument();
    $dom->load('fichero.xml');

    $nombres= $dom->getElementsByTagName('IP');

    foreach ($nombres as $nombre) {
        if($nombre->nodeValue == $ip){

            $veces = (int)$nombre->nextElementSibling->nodeValue;
            $nombre->nextElementSibling->nodeValue= $veces+1;
            $nombre->nextElementSibling->nextElementSibling->nodeValue=$fecha ;
            $dom -> save("fichero.xml");
            return true;    
            }
    }
    return false;
}

function anadirIP($ipHost,$fecha){

    $dom = new DOMDocument();
    $dom->load('fichero.xml');
    $raiz=$dom->childNodes[0];

    //elementos equipo
    $conexion = $raiz->appendChild($dom->createElement("Conexion"));
    $conexion->appendChild($dom->createElement("IP",$ipHost));
    $conexion->appendChild($dom->createElement("Veces","1"));
    $conexion->appendChild($dom->createElement("Fecha",$fecha));
    if($dom->save('fichero.xml')){
        echo "Todo correcto";
    }else{
        echo "Error";
    }
}
?>