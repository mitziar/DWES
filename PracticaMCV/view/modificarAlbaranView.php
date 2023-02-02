<?php
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    echo "<h1>Modificar Albaran</h1>";
    if(isset($_REQUEST['codigoAlbaran'])){

        
        $albaran=AlbaranDao::findById($_REQUEST['codigoAlbaran']);
        
            
        if($albaran){?>

    <div class="card mb-3" style="max-width: 540px;"> 
        
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Albaran <?echo $albaran->codigo?></h5>
                    <p class="card-text">Fecha: 
                    <input type="hidden" name="codigoAlbaran" value=<?echo $albaran->codigo?>>
                    <p class="card-text"><?echo $albaran->fecha?></p>
                    <p><input type="date" name="fecha" required></p>
                    <p class="card-text ">Cantidad: <?echo $albaran->cantidad?> uds</p>
                    <p><input type="number"  name="cantidad" required></p>
                    <p class="card-textt">Codigo de producto: <?echo $albaran->codigo?> </p>
                    <p><input type="number" min="1" name="codigo" id="idProducto" required></p>
                    <p class="card-text">Usuario: <?echo $albaran->usuario?></p>
                    <p><input type="hidden"  name="usuario" id="idUsuario"></p>
                    <input type='submit' href="./index.php" class="btn btn-secondary w-100" value = 'Modificar' name ='modificarAlbaran'>
                </div>
            </div>
        
    </div>
    </div>
 <?php }
}                      
?>