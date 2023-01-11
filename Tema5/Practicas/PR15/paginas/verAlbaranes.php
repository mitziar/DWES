<html lang="es">
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
<link rel="stylesheet" href="../css/estilosAlbaranes.css">
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
            <a href="../../PR15/">PR15/</a>Ver albaranes
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
                    break;
                case 2:
                    //moderador
                    echo "<a href='../index.php'>Index</a>";
                    echo "<a href='./verVentas.php'>Ventas</a>";
                    break;
                
                default:
                break;
            }
            echo "</nav>";
            }?>
            
       </div>
        <hr>
        <?php echo "<h2>Albaranes</h2>"; ?>
        <div class="row">
            <?php
                $fila=verAlbaranes();
                
                if(is_array($fila)){
                    echo "<div class='tabla'>";
                    if(isset($_SESSION['perfil'])){
                        switch ($_SESSION['perfil']){
                            case 1:
                                //administrador
                                echo "<div class='cabecera'>Código</div><div class='cabecera'>Fecha</div><div class='cabecera'>Cantidad</div><div class='cabecera'>Codigo Producto</div><div class='cabecera'>Usuario</div><div class='cabecera'>Borrar</div><div class='cabecera'>Modificar</div>";
                                break;
                            default:
                                echo "<div class='cabecera'>Código</div><div class='cabecera'>Fecha</div><div class='cabecera'>Cantidad</div>><div class='cabecera'>Codigo Producto</div><div class='cabecera'>Usuario</div>";
                                break;
                        }
                    
                    foreach ($fila as $key => $value) {
                        switch ($_SESSION['perfil']){
                            case 1:
                                //administrador
                                echo "<div class='dato'>".$value['codigo']."</div><div class='dato'>".$value['fecha']."</div><div class='dato'>".$value['cantidad']."</div><div class='dato'>".$value['producto']."</div><div class='dato '>".$value['usuario']."</div><div class='dato '><a href='modificarAlbaran.php?borrar=".$value['codigo']."'>Borrar</a></div><div class='dato cabeceras'><a href='modificarAlbaran.php?modificar=".$value['codigo']."'>Modificar</a></div>";
                                break;
                            default:
                                echo "<div class='dato'>".$value['codigo']."</div><div class='dato'>".$value['fecha']."</div><div class='dato'>".$value['cantidad']."</div><div class='dato'>".$value['producto']."</div><div class='dato cabeceras'>".$value['usuario']."</div>";
                                break;
                        } 
                    }
                   
                    echo "</div>";
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