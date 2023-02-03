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
        
                    <form action="./index.php">
                    <p class="card-textt">Codigo de producto: <?echo $albaran->codigo?> </p>
                    <p><input type="hidden" min="1" name="codigo" id="idProducto" required></p>
                    <p class="card-text">Fecha: <?echo $albaran->fecha?></p>
                    <p><input type="date" name="fecha" required></p>
                    <input type="hidden" name="codigoAlbaran" value=<?echo $albaran->codigo?>></p>
                    
                    
                    <p class="card-text ">Cantidad: <?echo $albaran->cantidad?> uds</p>
                    <p><input type="number"  name="cantidad" required></p>
                    
                    <p class="card-text">Usuario: <?echo $albaran->usuario?></p>
                    <p><input type="hidden"  name="usuario" id="idUsuario"></p>
                    <a href="./index.php?home=home"><input type = 'button' class="btn m-2 btn-secondary w-100" value="Volver"></a>
                    <input type='submit' class="btn btn-secondary w-100" value = 'Modificar' name ='modificaAlbaran'>
                    </form>
                    
                </div>
            </div>
        
    </div>
    </div>
 <?php }
}                      
?>