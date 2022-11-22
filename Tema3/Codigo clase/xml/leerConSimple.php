<?
$mundial = simplexml_load_file('mundial.xml');


//print_r($mundial);


//Acceder a cada validaFormulario
foreach ($mundial as $equipo) {
    echo 'Equipo: '.$equipo->children()[0];
    echo ' Entrenador: '.$equipo->children()[1];
}


//AÑADIR MODIFICAR

//añadir hiijo
$equipo = $mundial->addChild('Equipo');
$equipo->addChild('Nombre','Italia');
$equipo->addChild('Entrenador','Alexandro');

$mundial->asXML('mundial2.xml');

?>