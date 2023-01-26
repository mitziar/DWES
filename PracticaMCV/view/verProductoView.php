<?php

if(isset($_REQUEST['codigoProducto'])){
    $producto=ProductoDAO::findById($_REQUEST['codigoProducto']);
    if($producto){?>

    <div class="card" style="width: 18rem;">  
        <div class="card-body">
            <img class="card-img-top card-title m-3 w-75" src='./webroot/uploads/<?echo $producto->img?>' alt="Card image cap">
            <h5 class="card-title"><?echo $producto->nombre?></h5>
            <p class="card-text text-center"><?echo $producto->descripcion?>...</p>
            <p class="card-text text-left">Código: <?echo $producto->codProd?></p>
            <p class="card-text text-left">Precio: <?echo $producto->precio?> €</p>
            <p class="card-text text-left">Stock: <?echo $producto->stock?> unidades disponibles.</p>
            <label>Unidades: </label>
            <input type="number" class="float-right m-3" min="1" max="<?echo $producto->stock?>" name="unidades" id="idUnidades">
            <input type='submit' href="./index.php" class="btn btn-primary w-100" value = 'Comprar' name ='comprar'>
        </div>
    </div>
 <?php }
}                      
?>