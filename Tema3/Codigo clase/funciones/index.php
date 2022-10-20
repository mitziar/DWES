<h1>Funcion>/h1>
    <? include("./funciones.php");
    saludo2("Itziar");
    echo "<br>";

    $nombre = "Itziar";
    saludo3($nombre);
    echo "<br>";


    //nombre no se cambia porque está por valor
    echo "<br> cambio de nombre: ".$nombre;
    echo "<br>";

    //Si quiero que cambie el valor tendria que:
    //1.que devuelva return
    //pasarle por referencia
    //global


    //global
    echo "<br> usando global: ";
    saludo4();
    echo "<br> cambio de nombre: ".$nombre;

    echo "<br> usando return ";
    $nombre="Maria";//lo 
    $nombre=saludo5($nombre);
    echo "<br> cambio de nombre: ".$nombre;

    //referencia
    $nombre="Maria";//lo 
    echo "<br> usando referencia ";
    saludo6($nombre);
    echo "<br> cambio de nombre: ".$nombre;


    //valores por defeto
    $nombre="Maria";//lo 
    echo "<br> Valores por defecto ";
    saludo7();//muestra mundo
    saludo7("Maria");

    //PASAR UN ARRAY (en php es un dato simple)
    $array= array();
    //rellena el array con la hora que se ha hecho la llamada
    rellenaArray($array);//no hya cambios, pero dentro de la funcion si
    print_r($array);//xq array se pasa por valor

    //LOS OBJETOS SÍ SE PASAN POR REFERENCIA
    class Cuadrado{
        public $lado=5;
    }

    //creamos un objeto de la clase cuadrado
    $objeto= new Cuadrado();
    cambiarLado($objeto,6);
    echo "<br>Objeto: ".$objeto->lado;//para que efectue cambios fuera hay que pasar por referencia

    ?>

