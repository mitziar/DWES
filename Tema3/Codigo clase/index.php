<h2>Nave espacial</h2>
<?php
$a ="b";
$b ="a";

var_dump($a <=> $b);

$a=5;
$b=1;
echo "<br>Logicos";

var_dump($a & $b);
echo "<br>";
var_dump($a << $b);

echo "<br>";
var_dump($a << $b);

echo "<h2>Tomas de decisiones</h2>";
/**
 * que el algoritmo vaya por un camino o vaya por otro. Lo que es el flujo. Cada vez que tomammos una decisión se cambia
 * el flujo del programa 
 * 
 * -condicional: if, (si)
 * go to: no se usa, ya hay funciones
 * 
 * -condicional: if, (si) else (sino)
 * 
 * if, (si) else if (sino si) else (sino)
 * 
 * 
 * //////////////////////
 * switch (valor)
 * si no pongo break, entra en todas. Continue es también 
 */
echo "<br>";

switch ($a){
    case 1:
        echo "es 1 <br>";
        break;
    case 2:
        echo "es 2 <br>";
        break;
    default:
        echo "es otra <br>";
        break;
            
}
?>
<h2>BUCLES</h2>
<?php
//ejemplo de break: sale del bucle
//cuando llegue a 5 se sale
for ($i=0;$i<10;$i++){
        echo "<br>".$i;

        if($i==5)
        break;   
}

//ejemplo de continue: sale del bucle
//No imprima el 5
for ($i=0;$i<10;$i++){

    if($i==5)
    continue;//de aquí para abajo no hace nada, vuelve a entrar con i=6

    echo "<br>".$i;
}

//while: se ejecuta tantas veces mientras se cumpla la condicion

$a=1;
while($a>5)//se ejecuta infinito
echo "<br>".$a;


$a=1;
while($a>5)//se ejecuta 4 veces
{echo "<br>".$a;
    $a++;
}

$a=1;
do{//se ejecuta al menos una vez, eso lo diferencia
    echo "<br>".$a;
    $a++;
}while($a <=5)

/***************************
 * Ejercicio que muestre
       *
      ***
     *****  
 */

for($a=3;$a<=0;$a--){
    while($i=0;$i<=5;i++){
        echo "&nbsp;";
        if ( $a==$i){
            echo "*";
        }
    }
}
?>