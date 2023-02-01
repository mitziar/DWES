<?php
if(isset($_SESSION['error']))
{
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}?>
echo "<h1>Insertar Producto</h1>";
<div class="card mb-3" style="max-width: 540px;"> 
    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Nuevo producto</h5>
                <form action="./index.php" method="POST" enctype="multipart/form-data">
                    <p class="card-text text-lef">Nombre producto:</p><input type="text" required name="nombreProducto" >
                    <p class="card-text text-left">Descripción: </p><input type="text" required name="descripcion" >
                    <p class="card-text text-left">Precio: </p><input type="number" step="0.01" required name="precio" >
                    <p class="card-text text-left">Unidades: </p><input type="number"  required name="unidades">
                    <p class="card-text text-left">Imagen del producto: </p><input type="file" name="file" id="file">
                
                <a href="./index.php?home=home"><input type = 'button' class="btn m-2 btn-secondary w-100" value="Volver"></a>
                <input type='submit' href="./index.php" class="btn m-2 btn-secondary w-100" value = 'Registrar' name ='insertarProducto'>
                </form>
            </div>
        </div>
    <div>
</div>