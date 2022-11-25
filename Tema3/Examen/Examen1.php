<?php

if(!file_exists('examen.xml')){
    
        //Crear un documento indicamos parametros como la codificación
        $dom = new DOMDocument("1.0","utf-8");
        //formateamos la salida del documento, para que sea legible
        $dom->formatOutput =  true;

        //El documento será un fichero xml, creamos la raiz del xml
        $raiz = $dom->createElement('examen');

        //añadir la raiz al dom
        $dom->appendChild($raiz);

        //Crear etiquetas que contendrá el fichero
        $acceso = $raiz->appendChild($dom->createElement("acceso"));
        $fecha = date('d/m/y');
        $acceso->appendChild($dom->createElement("ip", $_SERVER['REMOTE_ADDR']));
        $acceso->appendChild($dom->createElement("veces",1));
        $acceso->appendChild($dom->createElement("fecha",$fecha));

        if($dom->save('examen.xml')){
            echo '<br> todo ok';
        }else{
            echo '<br> ERROR';
        }
    }else{

        $dom = new DOMDocument(); //creo un objeto del DOM
        
        $dom->load('examen.xml'); //Cargo el xml en el objeto del DOM
    
        $raiz = $dom->childNodes[0]; //Accedo a los hijos del dom, que será la raiz
    
        foreach ($raiz->childNodes as $registros) { //Recorro los hijos de la raiz que serán los alumnos del xml
             if ($registros->nodeType == 1) { //Si $alumno es un elemento nodo
                foreach ($registros->childNodes as $datos) { //Por cada hijo del alumno, lo guardo en $datos
    
                    if ($datos->nodeType == 1 && $datos->nodeValue == $_SERVER['REMOTE_ADDR']) {
                       /**Si datos es nodeType Elemento y el valor de nodoElemento datos es igual al nombre del alumno */

                         $datos = $datos->nextElementSibling;//Situar en valor de la ip
                         $datos = $datos->nextElementSibling;//situar en el valor de
                        if ($datos->nodeType == 1 && $datos->nodeValue =='veces') {

                           $nuevo= intval($datos->nodeValue)+1;
                           $registros->replaceChild($nuevo, $datos);
                       }

                  }else{
                    //No existe registro para esa IP
                    //Añadimos a la raiz un nuevo acceso
                    $nuevo = $raiz->appendChild($dom->createElement('acceso'));

                    //Añadimos los valores hijos de cada elmento acceso
                    $nuevo -> appendChild($dom->createElement('ip', $_SERVER['REMOTE_ADDR']));
                    $nuevo -> appendChild($dom->createElement('veces', 1));
                    $fecha = date('d/m/y');
                    $nuevo -> appendChild( $dom->createElement('fecha',$fecha));

                }
                //Guardamos los cambios
                
            }
       }
       if ($dom->save('examen.xml')) {
        echo '<br> OK';
        }
    }
}
?>