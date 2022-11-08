<?php
echo  "<h1>Abrir si existe el fichero</h1";
echo "Tenemos que tener en cuenta que se va a abrir para lectura con r, si va a ser para escritura da igual, porque si no E lo crea";

//ABRIR FICHERO SI EXITE
//le damos la ruta relativa del fichero

if(!file_exists('miarchivo.txt')){
    echo "<br>NO Existe";
}else{
    echo "<br>Existe";
    //TRAS COMPROBAR QUE EXISTE
    //ABRIR Y LEER
    if(!$fp=fopen("miarchivo.txt","r")){
        echo "<br>No se ha podido abrir. No such file or directorio";
        //Puede dar error tambien porque es fichero esté bloqueado
    }else{
        //cuanto debe leer, una linea, un palabra, caracteres
        //por ejemplo los txt usan un byte por cada letra
        //1-ver tamaño del fichor filesize(nombre del fichero, no la tuberia fp) y lee el tamaño del

        $leido = fread($fp, filesize('miarchivo.txt'));
        //php no sabe interpretar los saltos de linea, ->/n
        //abría que leer linea por linea filegets() y acabar
        echo '<br>',$leido;
        //como ya he leido CERRRA
        fclose($fp);
    }
    //LEER LINEA POR LINEA
    //hasta length-1
    echo  "<h2>leer linea por linea</h2>";
    if(!$fp=fopen("miarchivo.txt","r")){
        echo "<br>No se ha podido abrir. No such file or directorio";
        //Puede dar error tambien porque es fichero esté bloqueado
    }else{
        //miestras pueda leer una linea en el fichero
        echo  "<h2>miestras pueda leer una linea en el fichero: lea = fgets(fp,filesize('miarchivo.txt')</h2>";
        while($lea = fgets($fp,filesize('miarchivo.txt'))){
            echo "<br>";
            echo $lea;
        }
        fclose($fp);
    }
}
//ESCRITURA
echo  "<h2>Abrimos fichero para escritura, con opcion 'w' escribe al principio</h2>";

//if($fp=fopen('miarchivo.txt','w')){
 //   //funciones de escritura: fwrite //devuelve el numero de bytes escritos
//    $escribir='08/11/2022';
//   fwrite($fp,$escribir,strlen($escribir));//DEBE TENER PERMISOS!!!
//   fclose($fp);

//}else{
//    echo "<br>Ha habido un error";
//}

//ESCRITURA
echo  "<h2>ESCritura del archivo al final, con opcion 'a' escribe al final</h2>";
if($fp=fopen('miarchivo.txt','a')){
    //funciones de escritura: fwrite //devuelve el numero de bytes escritos
    $escribir='08/11/2022';
   fwrite($fp,$escribir,strlen($escribir));//DEBE TENER PERMISOS!!!
   fclose($fp);

}else{
    echo "<br>Ha habido un error";
}

echo  "<h2>ME HE EQUIVOCADO, CORREGIR</h2>";
//cambiar la fecha de 22 a 2022
//replace str_replace
//r+
if(!file_exists('miarchivo.txt')){
    echo "<br>Ha habido un error";
    
}else{
    if(!$fp=fopen('miarchivo.txt','r+')){
        echo "<br> Ha habido un problema";
    }else{
        //LEEMOS, reemplaza, poner puntero arriba del todo y escribir
        $leido=fread($fp,filesize('miarchivo.txt'));
        $remplazado = str_replace('/22','/2022',$leido);//En este caso nos vale la '/', si no usariamos PATRON
        fseek($fp,0);//fseek($fp,0) o rewind
        fwrite($fp,$remplazado,strlen($remplazado));
        fclose($fp);
    }
}
?>