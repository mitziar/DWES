<?php
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    echo "<h1>Modificar Producto</h1>";
    if(isset($_REQUEST['codigoProducto'])){

        
        $producto=ProductoDAO::findById($_REQUEST['codigoProducto']);
        
            
        if($producto){?>

    <div class="card mb-3" style="max-width: 540px;"> 
        <div class="row g-0">
            <div class="col-md-4">
                <img src='./webroot/uploads/<?echo $producto->img?>' class="img-fluid rounded-start">
                <input type="hidden" name="codigoProducto" value=<?echo $producto->img?>>
            </div>

            <?if(esAdmin()){?>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?echo $producto->nombre?></h5>
                    <form action="./index.php" method="POST">
                    <input type="hidden" name="nombreProducto" value=<?echo $producto->nombre?>>
                    <p class="card-text">Código: <?echo $producto->codProd?></p>
                    <input type="hidden" name="codigoProducto" value=<?echo $producto->codProd?>>
                    <p class="card-text">Descripción: <?echo $producto->descripcion?></p>
                    <input type="text" class="mb-3" name="descripcion" required value=<?echo $producto->descripcion?>>
                    <p class="card-text">Precio: <?echo $producto->precio?> €</p>
                    <input type="number" class="mb-3" step="0.01" name="precio" required value=<?echo $producto->precio?>>
                    <p class="card-text">Stock: <?echo $producto->stock?> unidades disponibles.</p>
                    <input type="number" class="mb-3" min="1" name="unidades" id="idUnidades" required value=<?echo $producto->stock?>>
                    <p class="card-text">Ruta de la imagen: <?echo $producto->img?></p>
                    <input type="hidden" name="imagen" value=<?echo $producto->img?>>
                    <a href="./index.php?home=home"><input type = 'button' class="btn m-2 btn-secondary w-100" value="Volver"></a>
                    <input type='submit' href="./index.php" class="btn btn-secondary m-2 w-100" value = 'Modificar' name ='modificarProducto'>
                    </form>
                </div>
            </div>
            <?}?>
        <div>
    </div>
 <?php }
}                      
?>