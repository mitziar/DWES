<?php
//array numericos

//array vacio
$meses =array();
echo var_dump($meses);


//creo array con datos
$meses = ("enero","febrero","marzo");
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
echo $meses[2]:

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


//Si salto una posicion al añadir valor dará vallo
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
}


//for each internamente coge el array con todos sus valores, en cada iteración mete en key lo que tiene meses
//key valdrá una cosa en cada iteración, 
//SIEMPRE USAR FOREACH PARA RECORRES ARRAYs, da igual de que tipo sea


//meter valores
array_push($meses,"Agosto");

foreach($meses as $key){
echo $key;
}

/** 
 *  pop quitar valores de la pila
 */

  echo "<br>";
  array_pop($meses);//quita el ultimo


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



  /**
   * Arrays asociativos van con clave valor
   * Se recorren con forEach
   */
  $notaS = ("Cristian"=>10,"Lucia"=>10,"Itziar"=>10);
  print_r($notas);

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
   echo var_dump($multi);

   $asignaturas = array(

    "DAM" =>  array("Progr"=> "Programación", "LM"=>"Lenguaje de marcas")
    "DAM2" => array ("DWES"=> "Servidor", "DWEC"=> "Cliente")
   )

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
    $notatis = ("Cristian"=>10,"Lucia"=>10,"Itziar"=>10);
    echo "Current".current($notatis);

    echo "<br> ultimo: ".end(($notatis));
    echo "Current".current($notatis);


    //ver primero
    echo "Current".reset($notatis);//el puntero está en el primero


    //coger la clave del valor en el que estoy

    echo "clave: ".key($notatis);
    end ($notatis);

?>
