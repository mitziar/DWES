<?php

if(isset($_REQUEST['codigoProducto'])){
    $producto=ProductoDAO::findById($_REQUEST['codigoProducto']);
    if($producto){?>

        <div class="card w-75">
        <div class="card-header">
            Comprar <?echo $producto->nombre?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?echo $producto->nombre?></h5>
            <img class="card-img-top w-25 h-25"  src="./webroot/uploads/<?echo $producto->img?>" alt="Card image cap">
            <p class="card-text text-center"><?echo $producto->descripcion?></p>
            <p class="card-text text-left">Precio: <?echo $producto->precio?> €</p>
            <p class="card-text text-left">Stock: <?echo $producto->stock?> unidades</p>
            <form class="form w-100" method="POST" action="./index.php">
                <input type="hidden" name="producto" id="codProd" value="<?echo $producto?>">
                <label>Unidades: </label>
                <input type="number" class="float-right" min="1" max="<?echo $producto->stock?>" name="unidades" id="idUnidades">
                <div >

                </div>
                <input type="submit" value="comprar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer text-muted">
        <p class="card-text text-center"><?echo $producto->codigo?></p>
        </div>
   <?php }

}
                        
?>