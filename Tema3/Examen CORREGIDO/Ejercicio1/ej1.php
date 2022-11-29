<?
require "./leerFichero.php";
//obtener ip

$ipHost=$_SERVER['REMOTE_ADDR'];

$fecha=date(DATE_RFC2822);

//fichero

if(file_exists('fichero.xml')){
//busco si se ha conectado la ip
    if(!comprobarIP($ipHost,$fecha)){

        anadirIP($ipHost,$fecha);

    }

}else{
      //  sino existe lo creo y escribo los parametros
      $dom = new DOMDocument("1.0","utf-8");
      //para que esté bonito
      $dom->formatOutput = true;
      $raiz = $dom->createElement("Conexiones");
      $dom->appendChild($raiz);

      $dom -> save("fichero.xml");
    anadirIP($ipHost,$fecha);
}

Leer();


