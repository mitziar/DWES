<?
$dom=new DOMDocument();

$dom->load('mundial.xml');

$raiz=$dom->childNodes[0];

foreach($raiz->childNodes as $elementos){
    if($elementos->nodeType==1){
        foreach($elementos->childNodes as $datos){
            if($datos->nodeType==1 && $datos->nodeValue=='Francia'){
                $nuevo=$dom->createElement('Entrenador','Joao');
                {
                    $cambiar='true';
                }
                if($cambiar && $datos->nodeName=='Entrenador'){
                    $elementos->replaceChild($nuevo,$datos);
                }
            }
        }
    }
}

if($dom->save('mundial.xml')){
    echo '<br> OK';
}



/**
 * 
 * OTRA FORMA
 */

 $nombres=$dom->getElementsByTagName('Nombre');
 foreach ($nombres as $value) {
    if($nombre->nodeValue =='Francia'){

        $nombre->nextElementSibling->nodeValue='Maria';
        echo "";
    }
 }

 if($dom->save('mundial.xml')){
    echo "Todo OK";
 }
?>