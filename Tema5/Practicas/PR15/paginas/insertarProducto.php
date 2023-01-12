<html lang="en">
    <?php
    include ('../funciones/bd.php');
    include ('../funciones/funciones.php');
    session_start();
    ?>
    <head>
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
<link rel="stylesheet" href="../css/estilosInsertar.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <title>DWES-Itziar</title>


  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Tema 5</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <a href="../../PR15/">PR15/</a>Insertar producto
        </div>
        <div class="row">
        <?php
            if(!estaValidado()){
                echo "<a href='../login.php' class='derecha'>Login</a>";
            }else{

                echo "<a href='../paginas/editarPerfil.php' class='derecha'>Editar perfil</a>";
                echo "<br>";
                echo "<a href='../logout.php' class='derecha'>Logout</a>";
            }
            ?>
        </div>
        <div class="row">
        
            <?php
            if(isset($_SESSION['perfil'])){
                echo "<nav>";
                switch ($_SESSION['perfil']){
                case 1:
                    //administrador
                    echo "<a class='claseTransicion' href='../index.php'>Index</a>";
                    echo "<a class='claseTransicion' href='./verVentas.php'>Ventas</a>";
                    echo "<a class='claseTransicion' href='./verAlbaranes.php'>Albaranes</a>";
                    break;
                break;
            }
            echo "</nav>";
            }?>
            
       </div>
        <?php
        if(enviado() && validadoProducto()){
            if(!empty($_FILES)){
                $rutaGuardado = "../uploads/";
                $rutaConNombreFichero = $rutaGuardado .  $_FILES['documento']['name'];
                if(!move_uploaded_file( $_FILES['documento']['tmp_name'],$rutaConNombreFichero))
                {

                    $_SESSION['error']='No se ha guardado la imagen';
                }else{
                    if(insertarProducto($_REQUEST['nombre'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['stock'],$_FILES['documento']['name'])){

                    header('Location:../index.php');
                    exit();
    
                    }else{
                        $_SESSION['error']= "No se ha podido insertar el producto";
                        header('Location:../index.php');
                        exit();
                    }
                }
                
            }
            
        }else{
            $errores=array();
            if(isset($_SESSION['errores'])){
                foreach ($_SESSION['errores']  as $value) {
                    echo $value."<br>";
                } 
                unset($_SESSION['errores']);
                echo "<br>";
            }
            echo "<h2>Nuevo producto</h2>";
            ?>
        <form action="./insertarProducto.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre del producto </label>
        <input type="text" name="nombre" id="nombre" value="<?php
        if(enviado()){

            if(vacio('nombre')){
            echo '">';
            array_push($errores,'Introduzca nombre de producto');
            }else{
                    echo $_REQUEST['nombre'].'">';
            }
        }else{
            echo '">';
        }
        ?>
        
        <label for="descripcion">Descripción del producto </label>
        <input type="text" name="descripcion" id="descripcion" value="<?php
        if(enviado()){

            if(vacio('descripcion')){
            echo '">';
            array_push($errores,'Introduzca descripción de producto');
            }else{
                    echo $_REQUEST['descripcion'].'">';
            }
        }else{
            echo '">';
        }
        ?>
        
        <label for="precio">Precio del producto </label>
        <input type="text" name="precio" id="precio" value="<?php
        if(enviado()){

            if(vacio('precio')){
            echo '">';
            array_push($errores,'Introduzca precio de producto');
            }else{
                if(precioValido($_REQUEST['precio'])){
                    echo $_REQUEST['precio'].'">';
                }else{
                    echo '">';
                    array_push($errores,'Precio incorrecto');
                }
                    
            }
        }else{
            echo '">';
        }
        ?>
        <label for="stock">Unidades</label>
        <input type="text" name="stock" id="stock" value="<?php
        if(enviado()){

            if(vacio('stock')){
            echo '">';
            array_push($errores,'Introduzca unidades de producto');
            }else{
                if(stockValido($_REQUEST['stock'])){
                    echo $_REQUEST['stock'].'">';
                }else{
                    echo '">';
                    array_push($errores,'Stock incorrecto');
                }
                    
            }
        }else{
            echo '">';
        }
        ?>
        <label for="documento">Imagen del producto</label>
        <input type="file" name="documento" id="documento">
             <?php
                 if(enviado() && empty($_FILES)){
                    array_push($errores,'Introduzca imagen del producto');
                 }
                 if(count($errores)>0){
                    $_SESSION['errores']=$errores;
                 }
            ?>
       
        <input type="submit" value="Enviar" id="enviar" name="enviar">
    </form><?php
        }
        ?>
    </div>
      </div> <!-- /container -->
      <footer class="container" style="background-color: bisque;">
        <p><center>Página de Itziar</center></p>
      </footer>
    
</body></html>