<?php
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    echo "<h1>Ver producto</h1>";
    if((isset($_REQUEST['codigoProducto']) || isset($_SESSION['codigoProducto'])) && (isset($_REQUEST['comprar'])||isset($_REQUEST['ver']) || isset($_REQUEST['enviar']))){

        if(isset($_REQUEST['codigoProducto'])){
            $producto=ProductoDAO::findById($_REQUEST['codigoProducto']);
        }else {
            $producto=ProductoDAO::findById($_SESSION['codigoProducto']);
        }
            
        if($producto){?>

    <div class="card mb-3" style="max-width: 540px;"> 
        <div class="row g-0">
            <div class="col-md-4">
                <img src='./webroot/uploads/<?echo $producto->img?>' class="img-fluid rounded-start">
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?echo $producto->nombre?></h5>
                    <p class="card-text text-center"><?echo $producto->descripcion?>...</p>
                    <p class="card-text text-left">Código: <?echo $producto->codProd?></p>
                    <p class="card-text text-left">Precio: <?echo $producto->precio?> €</p>
                    <p class="card-text text-left">Stock: <?echo $producto->stock?> unidades disponibles.</p>
                    <label>Unidades: </label>
                    <input type="number" class="float-right m-3" min="1" max="<?echo $producto->stock?>" name="unidades" id="idUnidades">
                    <input type="hidden" name="codigoProducto" value="<?echo $producto->codProd?>">
                    <input type="hidden" name="stock" value="<?echo $producto->stock?>">
                    <input type="hidden" name="precio" value="<?echo $producto->precio?>">
                    <input type='submit' href="./index.php" class="btn btn-secondary w-100" value = 'Comprar' name ='comprar'>
                </div>
            </div>
        <div>
    </div>
    </div>
 <?php }
}                      
?>