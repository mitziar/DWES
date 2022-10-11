<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<link rel="stylesheet" href="">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <title>DWES-Itziar</title>

  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Variables II</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../">Tema 2</a><a href="index.html">/Código de clase</a>/Constantes</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <pre>


        Varible de variable:

        Se pueden crear nombres de variables dinámicamente anteponiendo $$ a una variable. La variable de variable toma su nombre
        del valor de otra variable previamente declara.
            $var = "uno";
            $$var = "dos";
            print($var) -> "uno"
            print($uno) -> "dos"
            print($$var) -< "dos"
            Variables en la URL:

        Un mecanismo práctico aunque no muy seguro de intercambio de información entre una página y otra consiste en pasar las 
        variables a través de un sufijo en la URL de la página llamada. 
            http://www.mipagina.es/pagina.php?nombre=‘maría’
        El programa PHP recibe estas variables dentro de las matrices superglobales $_REQUEST o $_GET, 
            GET [ ‘nombre’ ] 
        Utilizar la función urlencode() cuando los valores de las variables en la URL contienen caracteres especiales.

    </pre>
    <h5>Pruebas</h5><br>
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

    <h5>tipos de datos</h5>

    <?
    #cadena
    var_dump("maria");
    #entero
    var_dump("3");
    #Decimal va con coma, si pongo punto interpreta otra variable
    var_dump("3.17");
    ?>
    <h5>variables</h5>
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

    <h5>GET </h5>
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
    //echo "".$_GET["hijos"];
    echo "<br>";
    #Comprobar con el is_número que el ultimo parametro lo es y como lo sabemos
    //echo "".is_numeric($_GET["hijos"]);//devuelve 1 xq es un true. 
    ?>
    <h5>Variables dinámicas: variable de variable con STRING</h5>;
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

    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>

