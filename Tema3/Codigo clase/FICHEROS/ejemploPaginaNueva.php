<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
    </head>
    <body>
        <?php
        if(isset($_REQUEST['enviar'])){
            if(isset($_REQUEST['fichero'])){
                if(file_exists($_REQUEST['fichero']))
                    {
                        //redirige a otra página 
                        header('Location: ./leer.php?fichero='.$_REQUEST['fichero']);
                        exit();
                    }
            }
        }
        ?>
        <form action="ejemploPaginaNueva.php" method="get">
            <input type="text" name="fichero" id="fichero">
            <input type="submit" value="enviar" name="enviar">
        </form>
    </body>
</html>