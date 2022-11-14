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
        <h2><center>Arrays</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../">Tema 3</a><a href="index.html">/Código de clase</a>/Arrays</h4>
        </div>
          <!-- Example row of columns -->
        <div class="row">
          <pre>
            Crear arrays:
              -Vacio: $nombreArray =array();
              -Con datos: $meses = array ("Enero","Febrero","Marzo");

            Darle longitud:
              $diasSemana=array(7);

            Sintaxis corta, se usa menos
                $notas = [2,3,5,5.3];
            
            Acceder y modificar. Añadir valor al array. TENGO QUE SABER EL NUMERO DEL INDICE
              $meses[2];
              $meses[3]="abril";

            Contar elementos del array COUNT (NO  USAMOS PUNTO, no .length)
              echo count($meses);//No usar para recorrer el array, da error si hemos eliminado una posición e intenta acceder

            Recorrer array
              *For each
              foreach($meses as $key){
                //acción
              }
            Funciones con array
              *array_push()
              array_push($meses,"Agosto");
              *array_pop()
              array_pop($meses);//quita el ultimo
              *unset($meses[0]);
              *print_r($notas);//ver array

            Arrays asociativos: van con clave valor. Se recorren con forEach

              $notaS = array ("Cristian"=>10,"Lucia"=>10,"Itziar"=>10);
              //acceder a un valor con su clave
              $notas["Lucia"];
        
              Se recorren con For each: la clave va en key y el valor para esa clave lo guarda en value.
              puedo poner key y value, o el nombre que quiera (nombre y nota, por ejemplo).

              foreach ($notas as $key => $value){
                 la nota de ".$key." es ".$value;
              }

              Si solo quiero el valor, se recorre así:

              foreach($variable as $key){
                $key;
              }

            Arrays Multidimensionales

            Crear:
            $multi = array(array(), array());
            Crear con valores:
            $asignaturas = array(
              "DAM" =>  array("Progr"=> "Programación", "LM"=>"Lenguaje de marcas"), 
              "DAM2" => array ("DWES"=> "Servidor", "DWEC"=> "Cliente"));

            Recorrer array anidado
            Dam es una key en el primer array

              foreach($asignaturas as $key=> $value){
                "El curso de ".$key." cursa las siguientes asignaturas";
                foreach($value as $siglas=> $nombre){
                    $siglas.":".$nombre;
                  }
              }
        
          Funciones: reset, next, prev, end, current, key   
          </pre>
        </div>
        <div class="row">
        <?php
//array vacio
$meses =array();
echo var_dump($meses);

//creo array con datos
$meses =array ("Enero","Febrero","Marzo");
echo "<pre>";
echo var_dump($meses);
echo "</pre>";

//darle longitud concreta
$diasSemana=array(7);
echo "<pre>";
echo var_dump($diasSemana);
echo "</pre>";

//sintaxis corta, se usa menos
$notas = [2,3,5,5.3];

//acceder o modificar
echo $meses[2];
//contar elementos del array COUNT (NO  USAMOS PUNTO, no .length)
echo "<br>";
echo count($meses);

//Recorrer array
for($i=0;$i<count($meses);$i++){
	//codigo
	echo "<br>";
	echo $meses[$i];
}

//añadir valor al array. TENGO QUE SABER EL NUMERO DEL INDICE
$meses[3]="abril";
for($i=0;$i<count($meses);$i++){
	//codigo
	echo "<br>";
	echo $meses[$i];
}


//Si salto una posicion al añadir valor dará fallo
$meses[5]="Junio";
$meses[6]="Julio";
echo var_dump($meses);//ver lo que hay

echo count($meses);//si cuento los meses me da 5, y al llegar al [4], dará un warning porque intento acceder a algo que no exite. por eso se usa forEach

for($i=0;$i<count($meses);$i++){
	//codigo
	echo "<br>";
	echo $meses[$i];
}

//for each recorre todo el array sin depender de los elementos que tenga
foreach($meses as $key){
echo $key;
echo "<br>";
}

//for each internamente coge el array con todos sus valores, en cada iteración mete en key lo que tiene meses
//key valdrá una cosa en cada iteración, 
//SIEMPRE USAR FOREACH PARA RECORRES ARRAYs, da igual de que tipo sea

//meter valores
array_push($meses,"Agosto");

foreach($meses as $key){
echo $key;
echo "<br>";
}

/** 
 *  pop quitar valores de la pila
 */

  echo "<br>";
  array_pop($meses);//quita el ultimo

  echo "<br>";
  //quitar elemento en concreto
  unset($meses[0]);
  echo "<pre>";
  echo var_dump($meses);
  echo "</pre>";

  echo "<br>";


  /**
   * se muestran array tambien con printr
   */
  print_r($meses);
  echo "<br>";


  /**
   * Arrays asociativos van con clave valor
   * Se recorren con forEach
   */
  $notaS = array ("Cristian"=>10,"Lucia"=>10,"Itziar"=>10);
  print_r($notas);
  echo "<br>";
//acceder a una sol
echo "<br>Mota ".$notas["Lucia"];

/**
 * la clave va en key
 * y el valor para esa clave lo guarda en value
 * 
 * puedo poner en key y en value el nombre que quiera
 * puedo porner nombre y nota
*/
foreach ($notas as $key => $value){
    echo "<br> la nota de ".$key." es ".$value;
}

/**
 * si solo quiero el valor
 */
  foreach($variable as $key){
    echo "<br>".$key;
  }

  /**
   * Arrays Multidimensionales
   */

   echo "<h1>multidimensionales</h1>";
   $multi = array(array(), array());//crear
   echo "<br>";
   echo var_dump($multi);

   $asignaturas = array(
    "DAM" =>  array("Progr"=> "Programación", "LM"=>"Lenguaje de marcas"), 
    "DAM2" => array ("DWES"=> "Servidor", "DWEC"=> "Cliente"));

   //Recorrer array anidado Dam es una key en el primer array
   foreach($asignaturas as $key=> $value){
    echo "<br> El curso de ".$key." cursa las siguientes asignaturas";
    foreach($value as $siglas=> $nombre){
        echo "<br>".$siglas.":".$nombre;
       }
   }


   /**
    * funciones
    *reset, next, prev, end, current, key -posicion en ese current, each
    */
    echo "<h1>funciones</h1>";
    $notatis = array("Cristian"=>10,"Lucia"=>10,"Itziar"=>10);
    echo "Current".current($notatis);

    echo "<br> ultimo: ".end($notatis);
    echo "Current".current($notatis);


    //ver primero
    echo "Current".reset($notatis);//el puntero está en el primero


    //coger la clave del valor en el que estoy

    echo "clave: ".key($notatis);
    end ($notatis);

?>

        </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>