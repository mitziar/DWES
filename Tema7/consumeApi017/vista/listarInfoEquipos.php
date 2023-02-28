
<div class=row>
<table>
    <tr>
<?
foreach ($lista[0] as $key => $value) {

        echo "<th>".$key."</th>";

}

echo "</tr>";

foreach ($lista as $key => $value) {
    echo "<tr>";
    foreach($value as $k => $v){
        echo "<td>".$v."</td>";
    }
    echo "</tr>";
}
?>
</table>
</div>