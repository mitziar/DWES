<?php
require_once('Persona2.php');

//PHP incomplete class name es un error si no importo la clase, sabe q es objeto pero no la conoce
echo $_GET['objeto'];
var_dump(unserialize($_GET['objeto']));

?>