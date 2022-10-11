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
        <h2><center>Fechas</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../">Tema 2</a><a href="index.html">/Codigo de clase</a>/Fechas</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <pre>
        Cuando mandamos una fecha al servidor, no esta predefinido el formato. Metemos en texto plano los segundos que han pasado
        desde 1970 (lo más usado), porque la fecha puede cambiar desde donde está el servidor a donde se ejecuta nuestra aplicación.
        Dependiendo del lenguaje usamos una forma u otra. PHP varias formas: API.

        time(): devuelve los segundos desde 1970. 

        El servidor si no indicamos nada, esta en ut0,

        date_default_timezone_set(string $timezone_identifier): bool
        date_default_timezone_set  establece la zona horaria predetermiada usada por todas las funciones de fecha/hora.
        string $timezone_identifier ... https://www.php.net/manual/es/timezones.php>Lista de zonas horarias admitidas.

        CLASE PARA TRABAJAR CON FECHAS CON PHP
        DateTime y DateTimeInterval
        para trabajar con fechas en los formularios es util
    </pre>
    <?php
    /**
     * fechas
     * 
     * cuando mandamos una fecha al servidor, no esta predefinido el formato. Metemos en texto plano los segundos que han pasado
     * desde 1970 (lo mas usado). porque la fecha puede cambiar desde donde está  el servidor a donde se ejecuta nuestra aplicación.
     * Dependiendo del lenguaje usamos una forma u otra. PHP varias formas: API.
     * 
     * time(): devuelve los segundos desde 1970 
     * 
     * el servidor si no indicamos nada, esta en ut0,
     * 
     * date_default_timezone_set(string $timezone_identifier): bool
     * date_default_timezone_set  establece la zona horaria predetermiada usada por todas las funciones de fecha/hora.
     * string $timezone_identifier ... https://www.php.net/manual/es/timezones.php>Lista de zonas horarias admitidas
     */
    echo "<p><h5>Prácticas de clase con fechas</h5><p><br>";
    echo "fecha en milisegundos <br>";
    echo "".time();
    echo "zona horaria <br>";
    echo date_default_timezone_get();

    echo "Cambio zona horaria <br>";
    echo date_default_timezone_set("Europe/Madrid")."<br>";
    echo date_default_timezone_get()."<br>";
    echo " <br>";

    /**
     * formateo la fecha funcion.date.php
     * Se muestra en ingles, pero se puede cambiar: buscar
     */

    echo"<p>fecha de hoy</p>";
    echo date("d M Y");

    echo"<p>pongo mes con numero con m minuscula</p>";
    echo date("d m Y");

    echo"<p>pongo horas minutos segundos</p>";
    echo date("d m Y h:m:s");

    /**
     * Meto un valor en String y me devuelve tiempo
     * strtotime fecha en texto a enteros
     */
    echo "<br>".strtotime("now");
    echo"<p>pongo horas minutos segundos</p>";
    echo "<br>".strtotime("2022 10 04");//coge la hora 00

    /**
     * Para que muestre dia mes año, pero los datos los tengo en año mes dia, Mezclamos las dos funciones para salga el 
     * formato que quiero. ejemplo 2022-10-04 y quiero 04/10/2022
     */
    echo date("2022-10-24")."<br>";
    echo date("d/m/y",strtotime("2022-10-24"));
    echo "<br>";
    /**
     * mktime
     * 
     * pide hora, minuto, segundo, dia, mes, año, en lugar de pasar un STRING le pasaré un parametro por cada dato
     * y nos lo traduce a los segundos desde 1970.
     */

    echo mktime(0,0,0,10,4,2022)."<br>";

    /**
    *Diferencia de año, mes y dia entre dos fechas
    *
    */

    $fecha1 = mktime(0,0,0,10,11,1994);
    $fecha2 = strtotime("2022-10-04");

    echo "DIFERENCIA FECHA<br>";
    $diferencia = $fecha2- $fecha1;

    echo $diferencia."<br>";
    $anos = $diferencia / (60*60*24*365)." diferencia<br>";
    echo $anos." esto son los años<br>";


    /**
    *CLASE PARA TRABAJAR CON FECHAS CON PHP
    *DateTime y DateTimeInterval
    *para trabajar con fechas en los formularios es util
    */

    //hago un objeto de esa clase. Hay que inicializar con su constructor
    $date1 = new DateTime();//asi coge la fecha actual, si no digo nada
    $fecha3= new DateTime("1994-10-11");//parsea la fecha de string

    $intervalo=$date1->diff($fecha3);// es un objeto

    echo "<br>Años: ".$intervalo->y." mes: ".$intervalo->m." dia: ".$intervalo->d;

    //Para acceder a los metodos, propiedades con "->"
    //la diferencia entre fechas, usamos metodo diff y nos devuelve un objeto DateInterval año, mes, dia, 
    //dias 


?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>