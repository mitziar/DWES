<?php
$var='<notas></notas>';
$raiz = new SimpleXMLElement($var);


if(!file_exists('notas.csv')){
   echo "<span>No existe el fichero</span><br>";
}else{
    if(!$fp=fopen('notas.csv','r')){
        echo "<span>No se puede abrir el fichero</span><br>";
   }else{
       

      while($leido=fgetcsv($fp,0,';')){
            $alumno=$raiz->addChild('alumno');
            $alumno->addChild('nombre',$leido[0]);
            $alumno->addChild('nota1',$leido[1]);
            $alumno->addChild('nota2',$leido[2]);
            $alumno->addChild('nota3',$leido[3]);
      }
      fclose($fp);
      if($raiz->asXML('notas.xml')){
        header('Location: ./LeerFicheroXML.php');
        exit();
      }else{
        echo "<br><span>No se ha podido crear el fichero xml</span>";
      }
    }
}



?>