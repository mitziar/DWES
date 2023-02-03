<?php
if(isset($_SESSION['error']))
{
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
echo "<h1>Ventas (mis compras)</h1>";
if($_REQUEST['codigoVenta']){
    $venta=VentaDao::findById($_REQUEST['codigoVenta']);
    if($venta){?>
        <div class="card mb-3 " style="max-width: 540px;"> 
        <div class="row ">
            <div class="col-md-8">
                <div class="card-body text-center">
                    <h5 class="card-title">Código de Venta <?echo $venta->id?></h5>
                    <form action="./index.php" method="POST">
                    <p class="card-text text-center">Código: <?echo $venta->id?></p><input type="hidden" name="codigoVenta" value=<?echo $venta->id?>>
                    <p class="card-text text-left">Fecha: <?echo $venta->fecha?><input type="date" name="fecha" value=<?echo $venta->fecha?>></p>
                    <p class="card-text text-left">Cantidad: <?echo $venta->cantidad?><input type="number" name="cantidad" value=<?echo $venta->cantidad?>></p>
                    <p class="card-text text-left">Precio: <?echo $venta->precio?> € <input type="number" step="any" name="precio" value=<?echo$venta->precio?>></p>
                    <p class="card-text text-left">Código producto: <?echo $venta->producto?><input type="number" name="codigoProducto" value=<?echo $venta->producto?>></p>
                    <p class="card-text text-left">Usuario: <?echo $venta->usuario?><input type="hidden" name="usuario" value=<?echo $venta->usuario?>></p>
                    <a href="./index.php?home=home"><input type = 'button' class="btn m-2 btn-secondary w-100" value="Volver"></a>
                    <input type='submit' href="./index.php" class="btn btn-secondary w-100" value = 'Modificar' name ='modificarDatosVenta'>
                    <form>
                </div>
            </div>
        <div>
    </div>
    <?}

}else{
    $_SESSION['No se puede modifcar la venta'];
}
?>