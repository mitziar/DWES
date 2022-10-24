
<?
//sin parametros
function saludo(){
    echo "Hola";
}
//COn un parametro
//No indico que tipo de dato devuelve, ni recibe
function saludo2($nombre){
    echo "Hola".$nombre;
}
//PHP NO PERMITE SOBRECARGA DE METODOS: no puede dar el mismo nombre a dos funciones
//PHP PERMITE llamar a funciones ocn menos parametros de los que se definen Excep
//cuando paso parametros los trata como un array, y por eso
//si intenta acceder a elementos de ese array que no existen
//nos dará error


//parametros tipos de dato normales se pasan POR VALOR

function saludo3($nombre){
    $nombre= $nombre . "valor";
    echo "Hola".$nombre;
}

echo "<hr>";
//cambiar una funcion global
function saludo4(){
    global $nombre;
    $nombre= $nombre . "valor";
    echo "Hola".$nombre;
}

//añadir return
function saludo5($nombre){
    $nombre= $nombre . "valor";
    echo "Hola".$nombre;
    return $nombre;
}

//pasar por referencia
function saludo6(&$nombre){
    echo "Hola".$nombre;
}

echo "<hr>";
//funcion que si no le pasamos valores use un valor por defecto
//como cuando en la ayuda nos pone [].
function saludo7($nombre="mundo"){
    echo "Hola".$nombre;
}

echo "<hr>";
//rellena array con la fecha,

function rellenaArray($array){

    array_push($array, date("h:i:s"));
    print_r($array);
}
//para que efectue cambios fuera hay que pasar por referencia
function rellenaArry(&$array){

    array_push($array, date("h:i:s"));
    print_r($array);
}

//Como es objeto pasa por referencia
function cambioLado($objeto,$lado){
    $objeto->lado = $lado;
}

?>