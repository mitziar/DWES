<?php
    echo "<h1>Administración de productos</h1>";
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(esAdmin()||esModerador()){?>
        <div class="row">
            <form action="./index.php" method="POST">  
                <button class="btn btn-secondary m-4" name="insertarProducto" type="submit">Insertar nuevo producto</button>
            </form>  
        </div>
        <h3>Listado de productos</h3>
        <?
        $productos=ProductoDAO::findAll();   
        if($productos){

        echo '<table class="table text-center">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col">Código</th>';
                    echo '<th scope="col">Nombre</th>';
                    echo '<th scope="col">Descripción</th>';
                    echo '<th scope="col">Precio</th>';
                    echo '<th scope="col">Stock</th>';
                    echo '<th scope="col">Ruta Imagen</th>';
                    echo '<th scope="col">Activo</th>';
                    if(esAdmin()||esModerador()){
                        echo '<th scope="col">Modificar</th>';
                    }
                    if(esAdmin()){
                        echo '<th scope="col">Eliminar</th>';
                    }
                    
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach($productos as $key => $producto){
            echo '<tr>';?>
                <th class="text-center" scope="row"><?echo $producto->codProd?></th>
                <td class="text-left"><?echo $producto->nombre?></td>
                <td class="text-left"><?echo $producto->descripcion?></td>
                <td class="text-center"><?echo $producto->precio?></td>
                <td class="text-center"><?echo $producto->stock?></td>
                <td class="text-center"><?echo $producto->img?></td>
                <td class="text-center"><?echo $producto->activo?></td>
                <?if($producto->activo&&(esAdmin()||esModerador())){?>
                
                <td>
                    <form action="./index.php" method="POST"> 
                        <input type="hidden" name='codigoProducto' value="<?echo $producto->codProd?>">
                        <button class="btn btn-primary" name="modificarProductos" type="submit">Modificar</button>
                    </form> 
                </td>
                
                <? if(esAdmin()){?>
                <td> 
                    <form action="./index.php" method="POST">  
                        <input type="hidden" name='codigoProducto' value="<?echo $producto->codProd?>">
                        <button class="btn btn-primary" name="eliminarProducto" type="submit">Eliminar</button>
                    </form>
                </td>
                <?}
                }
            echo '</tr>';
            }
            echo '</tbody>';
        echo '</table>';
        }
    }                
?>