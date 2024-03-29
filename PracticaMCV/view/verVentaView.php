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
    if(esAdmin()||esModerador()){
        echo "<h1>Ventas</h1>";    
    }else{
         echo "<h1>Mis compras</h1>";  
    }
     
    if($ventas){
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Número</th>';
        echo '<th scope="col">Fecha</th>';
        echo '<th scope="col">Cantidad</th>';
        echo '<th scope="col">Precio</th>';
        echo '<th scope="col">Código Producto</th>';
        echo '<th scope="col">Usuario</th>';
                   
        if(esAdmin()){
            echo '<th scope="col">Eliminar</th>';
            echo '<th scope="col">Modificar</th>';
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody ">';
        foreach($ventas as $key => $venta){
        echo '<tr class="text-center">';?>
            <th scope="row"><?echo $venta->id?></th>
            <td ><?echo $venta->fecha?></td>
            <td><?echo $venta->cantidad?></td>
            <td><?echo $venta->precio?> €</td>
            <td><?echo $venta->producto?></td>
            <td><?echo $venta->usuario?></td><?
            if(esAdmin()){?>
                <td>
                      <form action="./index.php" method="POST">  
                            <input type="hidden" name='codigoVenta' value="<?echo $venta->id?>">
                            <button class="btn btn-primary" name="eliminarVenta" type="submit">Eliminar</button>
                     </form>  
                </td>
                <td>
                      <form action="./index.php" method="POST"> 
                        <input type="hidden" name='codigoVenta' value="<?echo $venta->id?>">
                        <input class="btn btn-primary" name="modificarVenta" type="submit" value="Modificar">
                    </form> 
                </td>
            <?}            
        echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

    
    }else{
        $_SESSION['error']='No hay compras para mostrar';
    }
                    
?>