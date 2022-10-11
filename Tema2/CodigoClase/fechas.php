<h1>Fechas</h1>
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
echo "<h3><a href='../../../'>Desarrollo web en entorno servidor</a><a href='../../'>/Tema 2</a><a href='../'>/Código de clase</a>/fechas.php</h3>";
echo "fecha en milisegundos <br>";
echo "".time();
echo "zona horaria <br>";
echo date_default_timezone_get();

echo "cambio zona horaria <br>";
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
$date1 = new DataTime();//asi coge la fecha actual, si no digo nada
$fecha3= new DateTime("1994-10-11");//parsea la fecha de string

$intervalo=$date1->diff($fecha2);// es un objeto

echo "<br>Años: ".$intervalo->y." mes: ".$intervalo->m." dia: ".$intervalo->d;

//Para acceder a los metodos, propiedades con "->"
//la diferencia entre fechas, usamos metodo diff y nos devuelve un objeto DateInterval año, mes, dia, 
//dias 


?>