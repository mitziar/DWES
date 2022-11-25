<?php
    echo "<h1>Datos recibidos</h1>";
    foreach ($_REQUEST as $key => $value) {
        echo $key.": ".$value."<br>";
    }

?>