<?php
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['perfil']) && !esAdmin() && !esModerador()){
        $ventas=VentaDao::findByUser($_SESSION['user']);
    }else{
        $ventas=VentaDao::findAll();
    }
        
    if($ventas){

        foreach($ventas as $kew => $venta){?>
            <div class="card" style="width: 18rem;">  
                <div class="card-body">
                    <img class="card-img-top card-title m-3 w-75" src='./webroot/uploads/<?echo $ventas->img?>' alt="Card image cap">
                    <h5 class="card-title">Venta número: <?echo $venta->id?></h5>
                    <p class="card-text text-left">Fecha: <?echo $venta->fecha?></p>
                    <p class="card-text text-left">Cantidad: <?echo $venta->cantidad?></p>
                    <p class="card-text text-left">Precio: <?echo $venta->precio?> €</p>
                    <p class="card-text text-left">Código Producto: <?echo $venta->codigo?></p>
                </div>
            </div>
        <?}

    
    }else{
        $_SESSION['error']='No hay compras para mostrar';
    }
                    
?>