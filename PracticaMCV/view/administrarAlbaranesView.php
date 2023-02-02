<?php
    echo "<h1>Administración albaranes</h1>";
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(esAdmin()||esModerador()){?>
 
        <h3>Listado de albaranes</h3>
        <?
        $albaranes=AlbaranDao::findAll();   
        if($albaranes){

        echo '<table class="table text-center">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col">Código</th>';
                    echo '<th scope="col">Fecha</th>';
                    echo '<th scope="col">Cantidad</th>';
                    echo '<th scope="col">Código Producto</th>';
                    echo '<th scope="col">Usuario</th>';
                    if(esAdmin()){
                        echo '<th scope="col">Eliminar</th>';
                        echo '<th scope="col">Modificar</th>';
                    }
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach($albaranes as $key => $albaran){
            echo '<tr class="text-center">';?>
                <th scope="row"><?echo $albaran->codigo?></th>
                <td ><?echo $albaran->fecha?></td>
                <td><?echo $albaran->cantidad?></td>
                <td><?echo $albaran->producto?></td>
                <td><?echo $albaran->usuario?></td>
                <?if(esAdmin()){?>
                <td>
                    <form action="./index.php" method="POST">  
                        <input type="hidden" name='codigoAlbaran' value="<?echo $albaran->codigo?>">
                        <button class="btn btn-primary" name="eliminarAlbaran" type="submit">Eliminar</button>
                    </form>
                     
                </td>
                <td>
                    <form action="./index.php" method="POST"> 
                        <input type="hidden" name='codigoAlbaran' value="<?echo $albaran->codigo?>">
                        <button class="btn btn-primary" name="modificarAlbaran" type="submit">Modificar</button>
                    </form> 
                </td>
            <?   } 
            echo '</tr>';
            }
            echo '</tbody>';
        echo '</table>';
        }
    }                
?>