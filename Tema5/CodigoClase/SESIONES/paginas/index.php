<?php
session_start();
require '../funciones/funciones.php';
if(!estaValidado()){
    //mandar al login o informar no tiene permisos
    header('Location: ../login.php');
    exit();
}
?>
<header>
<h2><?php echo $_SESSION['nombre']?></h2>
<a href="../logout.php">Log out</a>
</header>
<?if(esModerador()){?>
    <h1>Moderador</h1>
<?}else{?>
        <h1>Usuario</h1>
<?}?>