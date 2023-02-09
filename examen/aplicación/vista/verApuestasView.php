
    <form action="./index.php" method="POST">
        <input type='submit' name='logout' id='logout' value='LOGOUT'>
    </form>
    <hr>
<?php

    $apuestas = ApuestaDao::findAll();
    if($apuestas){

        echo '<table class="table text-center">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col">ID</th>';
                    echo '<th scope="col">Fecha</th>';
                    echo '<th scope="col">Id Usuario</th>';
                    echo '<th scope="col">n1</th>';
                    echo '<th scope="col">n2</th>';
                    echo '<th scope="col">n3</th>';
                    echo '<th scope="col">n4</th>';
                    echo '<th scope="col">n5</th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($apuestas as $key => $apuesta){?>
                <tr class="text-center">
                <th scope="row"><?echo $apuesta->id?></th>
                <td ><?echo $apuesta->fecha?></td>
                <td><?echo $apuesta->iduser?></td>
                <td><?echo $apuesta->n1?></td>
                <td><?echo $apuesta->n2?></td>
                <td><?echo $apuesta->n3?></td>
                <td><?echo $apuesta->n4?></td>
                <td><?echo $apuesta->n5?></td>
                </tr>
                <?}?>
            </tbody>
    </table>
<?}

    if($sorteo=SorteoDao::findByFecha(date("Y-m-d"))){
        echo "ya se ha celebrado el sorteo, apuesta mañana";
    }else{?>
        <form action="./index.php" method="POST">
            <input type='submit' name='generar' id='generar' value='Generar sorteo'>
        </form>
    <?}
?>