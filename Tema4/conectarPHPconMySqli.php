<?php
require './seguro/conexion.php';
/**CON mysqli
 * suelen ser datos dinámicos: variará base datos, usuario, etc.
 * Lo normal esque no esten accesibles desde el exterior, un sitio seguro y encriptado
 * 
 * 
 * 
 * https://dev.mysql.com/doc/mysql-errors/8.0/en/server-error-reference.html
 */

 try{

    /**
     * NOS VALE PORQUE TENEMOS TODO EN LA MISMA MAQUINA VIRTURAL, PHP, MYSQL, Y APACHE
     */

     /**CONEXION CON FUNCIONES */
    //$conexion = mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS);

    //cuando existe la base de datos lo pasamos como cuarto parámetro
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS, 'mundial');


    /**
     * CONSULTAR BASE DE DATOS     * 
     */
    $sql='select * from equipo';

    //paso la conexion y el valor de la consulta [y tercero seria el modo de resultado: si tengo 10000 registros puede que me interesen todos los registro o segun voy itereando en un resultSet
    
    //devuelve un msqliresult. Si le pido algo que no existe numRows 0
    /**
     * tendre qeu utilizar un fetch, pero depende de que vamos a guardar
     * array asociativo: tendre cada columna con un nombre
    */

    /**CONSULTAS NORMALES */
    $resultado = mysqli_query($conexion,$sql);

    echo "<br> usando ALL";
    //print_r($resultado->fetch_all());//ver todos los resultados que han llegado, y el puntero acaba al final


    echo "<br> usando AArray. USAREMOS ESTO PORQUE NO HEMOS VISTO OBJETOS. puedo usar indice 0 o 'id'";
   // print_r($resultado->fetch_array());//solo saldrá el primer resultado, habria que recorrerlo. Puedo acceder a cada row, con el numero o con indice

     while($row=$resultado->fetch_array()){
     print_r($row);
     }

    echo "<br> usando Object";
    //funcion para cerrar la conexion
    //  while($row=$resultado->fetch_object()){
    //  print_r($row);
    //  }



    /**CONSULTAS PREPARADAS: que es y porque se usan. Es mas segura, por la inserción de datos*/


    mysqli_close($conexion);



    /*********************************************************************
     * CONEXION CON OBJETOS, toda la información dse crea en un objeto
     * 
     * try{
     *     $conexionObjeto = new msqli();
     *      $conexionO->connect($_SERVER['SERVER_ADDR'],USER,PASS, 'mundial');
     *         $conexionO->close () 
     * 
     * }catch(Exception $ex){
     * echo mysqli_connect_errno();
     *  echo mysqli_connect_error();
     * }
     *
    *******************************************************************************/

     /**ConsultasS  preparadas*/


//cuando existe la base de datos lo pasamos como cuarto parámetro
$conexion = mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS, 'mundial');


/**
 * CONSULTAR BASE DE DATOS     * 
 * mysqli_stmt_
 */
$sql='select * from equipo where id = ? and nombre = ?';
//como tengo dos interrogaciones le tengo que pasar dos valores

/**CONSULTAS NORMALES */
$resultado = mysqli_query($conexion,$sql);

$consultaPreparada= mysqli_stmt_init($conexion);
mysqli_stmt_prpare($consulta_preparada,$sql);

$id=1;
$nombre= 'España';

mysqli_stmt_bind_param($consulta_preparada,'i', $id);//i entero
mysqli_stmt_bind_param($consulta_preparada,'s', $nombre);//cadena
//d: float. //b:binario... 


mysqli_stmt_execute($consulta_preparada);//otro parámetro que puedo pasar es un array con los parámetros
mysqli_close($conexion);
 }catch (Exception $ex){
    if($ex->getCode()==2002){
        echo 'Error al conectar al servidor';
    }
    if($ex->getCode()==1045){
        echo 'Error acceso denegado para ese usuario';
    }
}finally{

}

echo "";






