
<?php
session_start();
require '../funciones/funciones.php';
if(!estaValidado() || !esAdmin()){
    //mandar al login o informar no tiene permisos
    header('Location: ../login.php');
    exit();
}
?>
<header>
<h2><?php echo $_SESSION['nombre']?></h2>
<a href="../logout.php">Log out</a>
</header>
<h1>Administrador</h1>