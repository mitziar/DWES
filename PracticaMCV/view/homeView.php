<?php

    echo "<div class='row justify-content-center'>";
    $productos = ProductoDAO::findAll();
    if(is_array($productos)){
        foreach($productos as $producto){
            if($producto->stock>=1){?>
                <div class="card" style="width: 18rem; margin:0.5%;">
                            <img class="card-img-top" src="./webroot/uploads/<?echo $producto->img?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?echo $producto->nombre?></h5>
                                <p class="card-text"><?echo $producto->descripcion?></p>
                                <form action="./index.php" method="POST"><?
                                    if(esAdmin() || esModerador()){?>
                                        <input type="submit" class="btn btn-secondary m-1" value="Aumentar unidades" name="aumentar">
                                    <?}
                                    if(esAdmin()){?>
                                        <input type="submit" class="btn btn-secondary m-1" value="Modificar producto" name="modificar">
                                    <?}
                                ?><div class="d-md-flex justify-content-md-end">
                                    <input type="hidden" name="codigoProducto" value="<?echo $producto->codProd?>">
                                    <input type="submit" class="btn btn-primary m-1 w-100"  value="Comprar" name="ver">
                                </div>
                                
                                </form> 
                            </div>
                </div>
            <?}
        }
    }
    echo "</div";
?>