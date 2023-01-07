<html lang="en">
    <?php
    session_start();
    require ('../funciones/bd.php');
    require ('../funciones/funciones.php');
    
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
            <a href="../../PR15/">PR15/</a>Comprar producto
        </div>
        <hr>
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
                    echo "<a href='../index.php'>Index</a>";
                    echo "<a href='./verVentas.php'>Ventas</a>";
                    echo "<a href='./insertarProducto.php'>Almacen</a>";
                    echo "<a href='./verAlbaranes.php'>Albaranes</a>";
                    break;
                case 2:
                    //moderador
                    echo "<a href='../index.php'>Index</a>";
                    echo "<a href='./verVentas.php'>Ventas</a>";
                    echo "<a href='./verAlbaranes.php'>Albaranes</a>";
                    break;
                case 3:
                    //usuario normal
                    echo "<a href='../index.php'>Index</a>";
                    echo "<a href='./verVentas.php'>Mis compras</a>";
                    break;
                default:
                break;
            }
            echo "</nav>";
            }?>
            
       </div>
        <hr>
        <div class="row">
            <?php
            if(isset($_REQUEST['comprar'])){
                if(isset($_SESSION['perfil'])){
                    $resultado=transaccionVenta($_REQUEST['codigo'],$_REQUEST['precio'],$_REQUEST['stock'],$_SESSION['user']);
                    if($resultado==true){
                        header('Location:./verVentas.php');
                        exit();
                    }else{
                        $_SESSION['error']='No se ha realizado la venta. '.$resultado;
                        header('Location:../index.php');
                        exit();
                    }
                }else{
                    $_SESSION['error']='Debe hacer login para comprar.';
                    header('Location:../login.php?codigo='.$_REQUEST['codigo']);
                    exit();
                }

            }else{
                
                    $fila=obtenerProducto($_REQUEST['codigo']);
                
                if(is_array($fila)){
                    echo "<form action='./comprarProducto.php' method='get'>";
                        echo "<h3>".$fila['nombre']."</h3>";
                        echo "<img src='../uploads/".$fila['ruta']."'>";
                        echo "<br>";
                        echo "<label>Codigo: </label>".$fila['codigo'];
                        echo "<input type='hidden' name='codigo' value='".$fila['codigo']."'>";
                        echo "<br>";
                        echo "<label>Precio: </label>".$fila['precio'];
                        echo "<input type='hidden' name='precio' value='".$fila['precio']."'>";
                        echo "<br>";
                        echo "<label>Unidades: </label>1";
                        echo "<br>";
                        echo "<label>Stock: </label>".$fila['stock'];
                        echo "<input type='hidden' name='stock' value='".$fila['stock']."'>";
                        echo "<br>";
                        if(isset($_SESSION['perfil'])){
                            if($_SESSION['perfil']==1 || $_SESSION['perfil']==2){
                                echo '<p><a class="btn btn-default" href="./aumentarUnidades.php?codigo='.$fila["codigo"].' role="button">Aumentar unidades»</a></p>';
                            }
                    }
                        echo '<input type="submit" value="Comprar" name="comprar">';
                    echo "</form>";
                }else{
                    echo $fila;
                }
            
            
            }
            ?>
        </div>        
    </div>
      </div> <!-- /container -->
      <footer class="container" style="background-color: bisque;">
        <p><center>Página de Itziar</center></p>
      </footer>
    
</body></html>