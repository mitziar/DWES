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
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?echo $producto->nombre?></h5>
                    <input type="text" name="nombreProducto" required>
                    <p class="card-text text-left">Código: <?echo $producto->codProd?></p>
                    <input type="hidden" name="codigoProducto" value=<?echo $producto->codProd?>>
                    <p class="card-text text-center"><?echo $producto->descripcion?></p>
                    <input type="text" name="descripcion" required>
                    <p class="card-text text-left">Precio: <?echo $producto->precio?> €</p>
                    <input type="number" step="0.01" name="precio" required>
                    <p class="card-text text-left">Stock: <?echo $producto->stock?> unidades disponibles.</p>
                    <input type="number" class=" m-3" min="1" name="unidades" id="idUnidades" required>
                    <p class="card-text text-left">Ruta de la imagen: <?echo $producto->img?></p>
                    <input type='submit' href="./index.php" class="btn btn-secondary w-100" value = 'Modificar' name ='modificarProducto'>
                </div>
            </div>
        <div>
    </div>
    </div>
 <?php }
}                      
?>