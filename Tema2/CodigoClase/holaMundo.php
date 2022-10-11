<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
echo "<h3><a href='../../../'>Desarrollo web en entorno servidor</a><a href='../../'>/Tema 2</a><a href='../'>/Código de clase</a>/holaMundo.php</h3>";
    <h1>puebas de php con html</h1>
<?
    #mal hecho
    echo "Hola Mundo";
    print("Hola clase");

    echo "<p>Hola Mundo</p>";
    #print("<p>Hola clase</p>");
?>

    <p><? echo "Hello world"?></p>
    <?
    ?>

<h1>tipos de datos</h1>

<?
#cadena
var_dump("maria");
#entero
var_dump("3");
#Decimal va con coma, si pongo punto interpreta otra variable
var_dump("3.17");
?>
<h1>variables</h1>
<?
    $mivariable=3;
    var_dump($mivariable);
    echo "<br>";
    $mivariable="maria";
    var_dump($mivariable);
    echo "<br>";

    #cambiar el tipo hacer CAST
    $mifloat = 3.17;
    var_dump($mifloat);
    echo "<br>";
    $nuevoint  = (int)$mifloat;
    var_dump($nuevoint);

    #al servidor todo llega como string
    #a traves de header con 
?>

<h1>GET </h1>
<?
var_dump($_GET);

#si una variable no tiene valor
#cuando tengo una variable a null se lo tengo que decir
#puedo usar is_null cuando la variale está establecida a null
$vacia=null;
$esnula = is_null($vacia);
var_dump($vacia);

#el punto concatena
echo "la variable es de tipo ".gettype($mivariable);
echo "<br>";
echo "recibo un ".gettype($_GET);
echo "<br>";
echo "".$_GET["hijos"];
echo "<br>";
#Comprobar con el is_número que el ultimo parametro lo es y como lo sabemos
echo "".is_numeric($_GET["hijos"]);//devuelve 1 xq es un true. 
?>
<h1>Variables dinámicas: variable de variable con STRING</h1>;
<?
echo "<br>";
$viernes ="fiesta";
$$viernes ="copa";


echo $viernes;
echo "<br>";
echo $$viernes;
echo "<br>";
echo $fiesta;

?>


</body>
</html>
