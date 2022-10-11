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
        <h2><center>Variables I</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../">Tema 2</a><a href="index.html">/Codigo de clase</a>/Variables I</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <pre>
    Ambito: global o local.
        
    Variables por valor y por referencia:

    La variable no contiene un valor sino la dirección de otra variable. El signo & indica que se está almacenando la 
    dirección de la variable y no su contenido. 

    $ref = &$var;

    Incluir Ficheros:

    Indluce lo llama, lo busca y lo usa. Si no existe sale un warning. Require es obligatorio. Si no lo encuentra muestra Error

    Variables static:

    Se suele usar en funciones, ejecuta la linea static y en la siguiente iteración no vuelve a leer como la primera vez. 
    //Osea lo carga y ya existe. No ejecuta la linea con static

    Variables especiales:

    $_SERVER,  $_GET, $_POST, $_COOKIE, $_REQUEST, $_ENV, $_FILES, $_SESSION

    </pre>
    <?php
/**
 * Indluce lo llama, lo busca y lo usa. Si no existe sale un warning
*Require es obligatorio. Si no lo encuentra muestra Error
*puedes incluir en html y en php
 */
//include ("../header.html");

/**
 * si hago include * 3 veces; 
 * Existe algo para que solo cargue un fichero una vez: include_once y require_once
 * da igual las veces que lo pongo que solo lo carga una vez
 */

    echo "<h5>Variables valor y referencia</h5>";
    //en java solo funciona en los array y los objetos

    echo "<h5>paso valor</h5><br>";
    $var1=1;
    $var2=$var1;
    $var1= $var1+1;
    echo $var1." esto es var1<br>";
    echo $var2." esto es var2<br>";

    echo "<h5>paso por referencia</h5><br>";
    $var3=1;
    $var4=&$var3;
    $var3= $var3+1;
    echo $var3." esto es var3<br>";
    echo $var4." esto es var4<br>";


    echo "<h5>Ambitos de la variable<h5>";
    echo "<h5>Local y global</h5><br>";

    //USANDO EL MISMO NOMBRE EN LOCAL Y EN GLOBAL
    $global = 1;
    function cambio(){
        //ambito local
        $global = 2;
        echo "<p>El valor de global en la función <p>".$global."<br>";
    }
    cambio();
    echo "<p>El valor de global fuera de la funcion <p>".$global."<br>";


    //USANDO LA MISMA VARIABLE CON SU DIRECCION Y TODO
    //aunque sea global, dentro de la función no puedo acceder a variable global porque no existe
    $global = 1;
    function cambio2(){
        $local = 2;
        //ambito local 
        //Dará error, porque no está definida $local = $global ;
        echo "<p>El valor de local en la función <p>".$local."<br>";
    }
    cambio2();
    echo "<p>El valor de global fuera de la funcion <p>".$global."<br>";

    //para que funcione lo anterior tendremos que usar la palabra reservada "global"

    $global = 1;
    function cambio3(){
        global $global;
        $local = $global;//será igual a 1
    
        echo "<p>El valor de local en la función <p>".$local."<br>";
    }
    cambio3();
    echo "<p>El valor de global fuera de la funcion <p>".$global."<br>";

    //LAS FUNCIONES: PODEMOS CREEAR VARIABLES DE FUNCION "static"
    echo "<h5>static</h5><br>";
    function crearCoches(){
        static $numeroVecesCreada=0;//en la siguiente iteración no vuelve a leer como la primera vez. 
        //Osea lo carga y ya existe. No ejecuta la linea con static
        $numeroVecesCreada= $numeroVecesCreada +1;
        echo "<p>Ha creado un coche<br>";
        echo "<p>llevo creado ".$numeroVecesCreada."</p>";
    }
    crearCoches();
    crearCoches();

    //en cualquier momento puedo usar un include, aunque se sulee poner arriba
    //include("./constantes.php");

    //echo USER." este es el nombre de un usuario que he guardado en otro fichero como constante</br>";


    /**
     * Son arrays, estan definidos aunque este vacio
    *  VARIABLES SUPER GLOBALES DE PHP
    *$_SERVER: IP SERVIDOR Y CLIENTE QUE LE LLAMA
    *$_GET 
    *$POST CABECERA DEL PROTOCOLO http
    *$_COOKIE
    *$_REQUEST SI NO SE SI ES ENVIADO POR GET O POST, AQUI ESTA TODO
    *$_ENV VARIABLES: no trabajamos con ello. Los procesos, demonios, servicios PID que se ejecutan en el servidor
    *$_FILES SOLO CON POST, UNO O VARIOS FICHEROS, TIENE LOS FICHEROS
    *$_SESSION VA A ESTAR VACIA, HASTA QUE LE DIGA QUE LO HAGA. ES UN ARRAY
    */

    //var_dump($_SERVER);
    var_dump($_GET);//poner en la url clave=valor
    var_dump($_POST);
    var_dump($_REQUEST);
    var_dump($_COOKIE);//clave valor y el tiempo, pero guarda a quien pertenece esa cookie
    //solo se acceden a ellas desde el mismo servidor que las ha creado
    var_dump($_FILES);//subo formulario y tenemos diferentes archivos. Solo se envian por post, nunca por get

    /**
     * a cada usuario le da un token diferente
     */
    //session_start();
    //var_dump("$_SESSION");//cuando hagamos login
    //para crear una sesion, pude ser con sesion, o token, pero para hacerlo en el servidor con session_start

    ?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>
