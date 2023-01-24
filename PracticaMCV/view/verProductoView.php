<?php
if(isset($_REQUEST['codigoProducto'])){
    $producto=ProductoDAO::findById($_REQUEST['codigoProducto']);
    if($producto){?>

        <div class="card text-center">
        <div class="card-header">
            Comprar <?echo $producto->nombre?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?echo $producto->nombre?></h5>
            <img class="card-img-top" src="./webroot<?echo $producto->img?>" alt="Card image cap">
            <p class="card-text"><?echo $producto->descripcion?></p>
            <a href="#" class="btn btn-primary">COMPRAR</a>
        </div>
        <div class="card-footer text-muted">
            
        </div>
   <?php }

}
                        
?>