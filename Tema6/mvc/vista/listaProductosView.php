<table border='1'>
    <thead>
        <th>Cod. Producto</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Ver</th>
        <th>Editar</th>
        <th>Borrar</th>
    </thead>
    <tbody>
        <?
            foreach($lista as $value ){
                echo "<tr>";
                echo "<td>".$value->codProd."</td>";
                echo "<td>".$value->codProd."</td>";
                echo "<td>".$value->codProd."</td>";
                echo "<td>".$value->codProd."</td>";
                echo "<td>".$value->codProd."</td>";
                echo "<form action ='./index.php'>";
                echo "<td> <input type='hidden' name='codProd' value='".$value->codProd."'></td>";
                echo "<td><input type='submit' name='ver' value='ver'></td>";
                echo "<td><input type='submit' name='editar' value='editar'></td>";
                echo "<td><input type='submit' name='borrar' value='borrar'></td>";
                echo "</form>";
                echo "</tr>";
            }
            
        ?>
    </tbody>
</table>
<?              
    echo "<form action='./index.php'>";
                    
    echo "<input type='submit' name='nuevoP' value='nuevo Producto'>";
                    
                    
    echo "</form>";
    ?>