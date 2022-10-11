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

echo "<body>";
echo "<h3><a href='../../../'>Desarrollo web en entorno servidor</a><a href='../../'>/Tema 2</a><a href='../'>/Código de clase</a>/variable.php</h3>";
echo "<h2>Variables valor y referencia</h2>";
//en java solo funciona en los array y los objetos

echo "<h3>paso valor<h/3><br>";
$var1=1;
$var2=$var1;
$var1= $var1+1;
echo $var1." esto es var1<br>";
echo $var2." esto es var2<br>";

echo "<h3>paso por referencia</h3><br>";
$var3=1;
$var4=&$var3;
$var3= $var3+1;
echo $var3." esto es var3<br>";
echo $var4." esto es var4<br>";


echo "<h2>Ambitos de la variable<h2>";
echo "<h3>Local y global</h3><br>";

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
echo "<h3>static</h3><br>";
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

echo "<pre>";
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
session_start();
var_dump("$_SESSION");//cuando hagamos login
//para crear una sesion, pude ser con sesion, o token, pero para hacerlo en el servidor con session_start
echo "<pre>";
echo "</body>";

?>