<?//CREAR ESTRUCTURA Y DESPUES GUARDAR

//-1  LA CLASE. DOM 
$dom = new DOMDocument("1.0","utf-8");
//no deja la salida bonita
$dom->formatOutput =  true;

//2- CREAR RAIZ
$raiz = $dom->createElement('Mundial');

//3-añadir la raiz al dom
$dom->appendChild($raiz);



//ELEMENTOS del MUNDIAL: Equipos.
//A la raiz le añadimos lo que estamos creando y nos lo devuelve en una variable
$equipo = $raiz->appendChild($dom->createElement("Equipo"));
$equipo->appendChild($dom->createElement("Nombre","España"));

$equipo->appendChild($dom->createElement("Entrenador","Luis Enrique"));


//AÑADIR OTRO EQUIPO
$equipo = $raiz->appendChild($dom->createElement("Equipo"));
$equipo->appendChild($dom->createElement("Nombre","Francia"));

$equipo->appendChild($dom->createElement("Entrenador","Pepe"));




//4- guardamos en dom en un documento. OJO PERMISOS!!
if($dom->save('mundial.xml')){
    echo '<br> todo ok';
}else{
    echo '<br> ERROR';
}