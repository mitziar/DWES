
//mostrar apuesta
<form action="./index.php" method="POST">
<?php
for($i=1;$i<=50;$i++){
    echo "<label for name=numero>$i<input style='display:inline' name='numero[]' type='checkbox' id=".$i." value=".$i."></label>";
}
?>
    <br>
    <input type='submit' name='modificar' id='modificar' value='Modificar apuesta'>
</form>
<hr>
<form action="./index.php" method="POST">
    <input type='submit' name='logout' id='logout' value='LOGOUT'>
</form>
?>