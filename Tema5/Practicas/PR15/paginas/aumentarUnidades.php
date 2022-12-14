<html lang="en">
    <?php
    session_start();
    include ('../funciones/bd.php');
    include ('../funciones/funciones.php');
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
<link rel="stylesheet" href="../css/estilos.css">
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
            <a href="../../PR15/">PR15/</a>Aumentar unidades
        </div>
        <div class="row">
        <?php
            if(!estaValidado()){
                echo "<a href='login.php' class='derecha'>Login</a>";
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
                    echo "<a href='../index.php'>Index</a>";
                    echo "<a href='./verVentas.php'>Ventas</a>";
                    echo "<a href='./verAlbaranes.php'>Albaranes</a>";
                    echo "<a href='./insertarProducto.php'>Almacen</a>";
                    break;
                    
                break;
                case 2:
                    //moderador
                    echo "<a href='../index.php'>Index</a>";
                    echo "<a href='./verVentas.php'>Ventas</a>";
                    echo "<a href='./verAlbaranes.php'>Albaranes</a>";
                    break;
                default:
                break;
            }
            echo "</nav>";
            }?>
            
       </div>
        <?php
        
            if(enviado() && validadoProducto()){
                
                        if(transaccionModificarProducto($_REQUEST['codigo'],$_REQUEST['stock'])){

                        header('Location:./verAlbaranes.php');
                        exit();
        
                        }else{
                            $_SESSION['error']= "No se ha podido insertar el producto";
                            header('Location:../index.php');
                            exit();
                        }                

            }else{
                echo "<h2>Aumentar unidades</h2>";
                $fila=obtenerProducto($_REQUEST['codigo']);
                if(is_array($fila)){
                    ?>
                    
                    <form action="./aumentarUnidades.php" method="post" enctype="multipart/form-data">
                    <input type="hidden"  name="codigo" id="codigo" value=<?php echo $fila['codigo']?>>
                    <label for="nombre">Nombre del producto </label>
                    <input type="text" readonly name="nombre" id="nombre" value="<?php
                    if(enviado()){

                        if(vacio('nombre')){
                        echo '">';
                        echo '<span>Introduzca nombre del producto</span>';
                        }else{
                                echo $_REQUEST['nombre'].'">';
                        }
                    }else{
                        echo $fila['nombre'].'">';
                    }
                
                    ?>
                    <br>
                    <label for="descripcion">Descripci??n del producto </label>
                    <input type="text" readonly name="descripcion" id="descripcion" value="<?php
                    if(enviado()){

                        if(vacio('descripcion')){
                        echo '">';
                        echo '<span>Introduzca descripcion del producto</span>';
                        }else{
                                echo $_REQUEST['descripcion'].'">';
                        }
                    }else{
                        echo $fila['descripcion'].'">';
                    }
                    ?>
                    <br>
                    <label for="precio">Precio del producto </label>
                    <input type="text" readonly name="precio" id="precio" value="<?php
                    if(enviado()){

                    if(vacio('precio')){
                        echo '">';
                        echo '<span>Introduzca precio del producto</span>';
                        }else{
                            if(precioValido($_REQUEST['precio'])){
                                echo $_REQUEST['precio'].'">';
                            }else{
                                echo '">';
                                echo '<span>Precio no v??lido.</span>';
                            }
                                
                        }
                    }else{
                        echo $fila['precio'].'">';
                    }
                    ?>
                    <br>
                    <label for="stock">Unidades</label>
                    <input type="text" name="stock" id="stock" value="<?php
                    if(enviado()){

                        if(vacio('stock')){
                        echo '">';
                        echo '<span>Introduzca unidades del producto</span>';
                        }else{
                            if(stockValido($_REQUEST['stock'])){
                                echo $_REQUEST['stock'].'">';
                            }else{
                                echo '">';
                                echo '<span>Stock no v??lido.</span>';
                            }
                                
                        }
                    }else{
                    echo $fila['stock'].'">';
                    }
                    ?>
                    <br>
                    <label for="documento">Imagen del producto</label><?php
                    echo '<input type="text" readonly name="documento" id="documento" value=';
                    if(!empty($fila['ruta'])){
                        echo $fila['ruta'].'>';
                        echo "<br>";
                        echo "<img width='200px'src='../uploads/".$fila['ruta']."'>";
                    }else{
                        echo '"imagenPorDefecto.png">';
                    }
                    
                    if(enviado() && empty($_FILES)){
                        echo "<span>Introduce documento</span>";
                    }
                    ?>
                    <br>
                    <input type="submit" value="Enviar" name="enviar">
                    </form><?php
                }else{
                    $_SESSION['error']='No existe producto';
                    header('Location:../index.php');
                    exit();
                }
            }
        
        ?>
    </div>
      </div> <!-- /container -->
      <footer class="container" style="background-color: bisque;">
        <p><center>P??gina de Itziar</center></p>
      </footer>
    
</body></html>