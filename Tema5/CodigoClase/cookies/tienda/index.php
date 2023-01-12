<?php
// setcookie('nombre','itziar',time()+120); CREAR
// setcookie('nombre','itziar',time()-120); BORRAR
//print_r($_COOKIE);


require './funciones/funciones.php';
require './seguro/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='./webroot/css/style.css' rel="stylesheet">
    <title>Document</title>
</head>
<body>
        <h1>Mi panaderia</h1>
        <main>
            <section class='productos'>
                <h3>Todos</h3>
                <?php
                    $lista= findAll();
                    foreach ($lista as $producto) {

                        echo "<article class='card'>";
                            echo "<img src='./webroot/".$producto['baja']."'>";
                            echo "<p>".$producto['nombre']."</p>";
                            echo "<a href='verProducto.php?producto=".$producto['codigo']."'>Ver</a>";
                        echo "</article>";
                    }
                ?>
            </section>
            <section class='vistos'>
                <h3>Vistos</h3>
                <?php
                //recogemos de cookies los ids
                    mostrarUltimo();
                ?>
            </section>
        </main>
</body>
</html>