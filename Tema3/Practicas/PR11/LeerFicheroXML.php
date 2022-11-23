<?php

$notas = simplexml_load_file('notas.xml');


echo "<table>";
echo "<tr><th>Nombre</th><th>Nota 1</th><th>Nota 2</th><th>Nota 3</th></tr>";
//Acceder a cada validaFormulario
foreach ($notas as $alumno) {
echo "<tr><td><a href='EditarAlumno.php?alumno=".$alumno->children()[0]."'>".$alumno->children()[0]."</a></td><td>".$alumno->children()[1]."</td><td>".$alumno->children()[2]."</td><td>".$alumno->children()[3]."</td></tr>";
}
echo "</table>";
?>