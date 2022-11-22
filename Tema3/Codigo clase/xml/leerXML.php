<?

//tenemos una clase DOM
$dom=new DOMDocument();//si inspeccionamos esta etiqueta el dom tendrá solo un hijo: departamentos
//para acceder a los hijos $dom->childNodes[0] es indice 0, se que solo tiene un hijo:<departamentos>
//ver el depurador cuando nos cueste ver un hijo

//cargamos en esa clase lo que tenemos en el fichero con load
$dom->load('departamento.xml');



//recoger el nodo RAIZ
$raiz = $dom->childNodes[0];

//acceder al nombre de la etiqyueta rai<
echo "Raiz ".$raiz->nodeName."<br>";

//acceder al numero de hijos del raiz. TIENE EN CUENTA EL TXTO
echo "tiene".$raiz->childNodes->length." hijos<br>";

//RECORRER LOS HIJOS
foreach ($raiz->childNodes as $elementos) {
    echo "";//cada tipo de elemento, tiene un nodetype asociado, por ejemplo el 3 corresponde a texto, coger el 1 es de tipo elemento
    if($elementos->nodeType==1){
        //aquí accedemos a los elementos de tipo1: que será etiqueta departamento
        echo "<br> Un hijo que es: ".$elementos->nodeName;
        foreach($elementos->childNodes as $datos){
            if($datos->nodeType==1){
                echo "<br>\t Un hijo que es: ".$datos->nodeName." y valor: ".$datos->nodeValue;
            }
        }
    }
}
?>