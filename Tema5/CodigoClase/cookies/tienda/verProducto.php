<?php
require './funciones/funciones.php';
require './funciones/funcionesCookies.php';
require './seguro/conexion.php';
if(!isset($_REQUEST['producto'])){
    //si no llega id producto en el index
    header('Location:./index.php');
}else{
    $id=$_REQUEST['producto'];
    productoVisto($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./webroot/css/style.css">
    <title>Document</title>
</head>
<body>
    <section class='productos'>
        <h3>Producto</h3>
        <?php
            $producto=findById($id);
            $producto=$producto[0];
            echo "<article class='card'>";
                echo "<img src='./webroot/".$producto['alta']."'>";
                echo "<p>".$producto['nombre']."</p>";
                echo "<p>".$producto['descripcion']."</p>";
            echo "</article>";
        ?>
    </section>
    <section class='vistos'>
        <h3>Vistos</h3>
        <?php
        mostrarUltimo();
        ?>
    </section>
    <section>
        <a href='./index.php'>Volver</a>
    </section>
   
</body>
</html>