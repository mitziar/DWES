<?
//Cambiar el entrenador de Francia por Joau

//leer el documento cargar dom
$dom=new DOMDocument('modificar.php');

//cargamos en esa clase lo que tenemos en el fichero con load
$dom->load('mundial.xml');

//recoger el nodo RAIZ
$raiz = $dom->childNodes[0];


//RECORRER LOS HIJOS
foreach ($raiz->childNodes as $elementos) {
    if($elementos->nodeType==1){
        //aquí accedemos a los elementos de tipo1: que será etiqueta equipo
        echo "<br> Un hijo que es: ".$elementos->nodeName;
        foreach($elementos->childNodes as $datos){
            if($elementos->nodeType==1 && $datos->nodeValue=='Francia'){
                if($datos->nodeValue=='Pepe')
                $datos->nodeValue="Joau";
            }
        }
    }
}

//buscar la etiqueta nombre que tenga valor Francia
//Cambiar el value por Joau
//Salvar el documento
?>