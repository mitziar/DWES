<?php
    $nombre=$_REQUEST['nombre'];
    echo $nombre."<br>";
    $contraseña=$_REQUEST['pass'];
    echo $contraseña."<br>";
    
    if (isset($_REQUEST['genero'])){
        $genero = $_REQUEST['genero'];
        echo "el genero es ".$genero."<br>";
    }else{
        echo "no ha enviado genero <br>";
    }

    echo "<br> Las asignatruas que has elegido son:";
    if(isset($_REQUEST["asignaturas"]))
        foreach ($_REQUEST["asignaturas"] as $key => $value) {
            # code...
            echo "<br>-". $value;
    }
    else 
        echo "Ninguna";

    echo "<br>";

    $curso=$_REQUEST['curso'];
 
        switch ($curso){
            case 1:
                echo "curso primero";
                break;
            case 2:
                echo "curso segundo";
                break;
            }
            echo "<br>";
            print_r($_FILES);


            $rutaGuardado = "./uploads/";
            
                            // Se le establece el nombre al archivo a guardar
                            $rutaConNombreFichero = $rutaGuardado .  $_FILES['fichero']['name'];
            
                            // Si se mueve el fichero del sitio temporal a la ruta especificada...
                            if(move_uploaded_file($_FILES['fichero']['tmp_name'],$rutaConNombreFichero))
                            {
                                echo "<br>El fichero se ha guardado correctamente.<br>";
            
                                // Si subo una imagen, la guardo y la cargo en el html //
                                echo "La ruta es: <b>" . $rutaConNombreFichero . "</b><br>";
            
                                echo "<img src='" . $rutaConNombreFichero . "' alt='Imagen' width='100px' height='100px'>";
                                //<img src="pic_trulli.jpg" alt="Italian Trulli">
            
                            }
                            else
                            {
                                echo "<br>Error al guardar el fichero.";
                            }
?>