<?php
    include('validado.php');
?>
<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <style>
        *,
        input {
            margin: 10px;
        }
    </style>
    <?php
    $array = array(
        "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
        "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
        "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
    );
    $errores=array();//almacenará errores
    /*Comprueba que se ha enviado el formulario y está correcto     */
    if(enviado() && validado()){
        //se ha enviado el formulario y está correcto, dirigimos a la página que muestra los datos
        header('Location: ./mostrar.php?nombre='.$_REQUEST['nombre'].'&exp='.$_REQUEST['exp'].'&cursos='.$_REQUEST['cursos']);
        exit();//salimos de esta página

    }else{
     //no se ha enviado el formulario y está correcto

    ?>    
    <form action="./examen2.php" method="get">
        
        
        <label for="nombre">Nombre y apellidos:</label> 
        <input type="text" name="nombre" id="nombre" value="<?php 
           $patron='/[A-Z]{1}[a-z]{2,}(\s)[A-Z]{1}[a-z]{2,}(\s)[A-Z]{1}[a-z]{2,}/';
            if(isset($_REQUEST['Enviado'])){
                //Si se ha enviado el formulario
                if(!empty($_REQUEST['nombre']) && preg_match($patron,$_REQUEST['nombre'])){
                    //Si  el campo nombre no está vacio y cumple el patron, muestro su valor
                    echo $_REQUEST['nombre'];?>"><?php
                }else{
                    ?>"><?php
                    echo "<span>Nombre y apellidos no válido<span><br>";
                    array_push($errores,"error nombre");
            
                }
            }else{
                ?>"><?php
            }
        ?>
                
        <br> <label for="exp">Expediente</label>
        <input type="text" name="exp" id="exp" value="<?php 
            $patron='/\d{2}[a-z]{3}(\/)\d{2}/';
            if(isset($_REQUEST['Enviado'])){
                if(!empty($_REQUEST['exp']) && preg_match($patron,$_REQUEST['exp'])){
                    //Si  el campo nombre no está vacio y cumple el patron, muestro su valor
                echo $_REQUEST['exp'];?>"><?php
            }else{
                ?>"><?php
                echo "<span>Expediente no válido<span><br>";
                array_push($errores,"error expediente");
            }
        }else{
            ?>"><?php
        }
        ?>
        <br> <label for="cursos">Curso:</label> <select name="cursos" id="curso">
            <option value="0">Selecione una opcion</option>
                    <?php
                    foreach ($array as $key => $value){
                        ?><option value='<?php echo $key ?>'<?php if(isset($_REQUEST['cursos']) && $_REQUEST['cursos']==$key){echo "selected";}?>><?php echo $key ?></option><?php
                    }
                    ?>
        </select><?php
        if(isset($_REQUEST['cursos']) && intval($_REQUEST['cursos'])==0){
          
            echo "<span>Introduce curso<span><br>";
            array_push($errores,"error curso");
        }?>
        <br><input type="submit" name="Enviado" value="Enviar">
    </form>

    <?php
       }
    ?>

</body>

</html>