<html lang="es">
    <?php

    session_start();
    //seguro/conexio.ogo
    require './funciones/funciones.php';
    require './funciones/bd.php';
   
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<link rel="stylesheet" href="./css/estilos.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <title>DWES-Itziar</title>

  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Prácticas</center></h2>
      </div>
    </div>

    <div class="container">
    <div class="row">
        <h4><a href="../../Practicas/">Tema 5</a>/Prácticas</h4>
        <hr>
    </div>
    <div class="row">
        <?php
            if(!estaValidado()){
                echo "<a href='login.php' class='derecha'>Login</a>";
            }else{

                echo "<a href='./paginas/editarPerfil.php' class='derecha'>Editar perfil</a>";
                echo "<br>";
                echo "<a href='logout.php' class='derecha'>Logout</a>";
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
                    echo "<a class='claseTransicion' href='./paginas/verAlbaranes.php'>Albaranes</a>";
                    echo "<a class='claseTransicion' href='./paginas/verVentas.php'>Ventas</a>";
                    echo "<a class='claseTransicion' href='./paginas/insertarProducto.php'>Almacen</a>";
                    break;
                case 2:
                    //moderador
                    echo "<a class='claseTransicion' href='./paginas/verAlbaranes.php'>Albaranes</a>";
                    echo "<a class='claseTransicion' href='./paginas/verVentas.php'>Ventas</a>";
                    break;
                case 3:
                    //usuario normal
                    echo "<a class='claseTransicion' href='./paginas/verVentas.php'>Mis compras</a>";
                    break;
                default:
                    break;
                break;
            }
            echo "</nav>";
            }
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            echo "<hr>";
            echo "<h2 class='titulo'>PRODUCTOS</h2>";
            echo "</div>";
            
            $resultado=mostrarProductos();
            if(is_array($resultado)){
                echo "<div class='padre'>";
                foreach ($resultado as $key => $value) {
                    if($value['stock']>=1){
                      ?><div class="hijo"><?php
                    
                    echo "<h4>";
                    echo $value['nombre'];
                    echo "</h4>";
                    echo "<img class='imagen' src='./uploads/".$value['ruta']."'>";
                    echo "<br>";
                    echo "Precio: ".$value['precio']." €";
                    echo "<br>";
                    echo "Unidades: ".$value['stock'];  
                    
                    if(isset($_SESSION['perfil'])){
                            if($_SESSION['perfil']==1){
                                echo "<fieldset>";
                                echo "<p style='font-size:10px'>Administrador</p>";
                                echo '<p><a class="btn btn-default" href="./paginas/modificarProducto.php?codigo='.$value["codigo"].' role="button">Modificar producto»</a></p>';
                                echo '<p><a class="btn btn-default" href="./paginas/aumentarUnidades.php?codigo='.$value["codigo"].' role="button">Aumentar unidades»</a></p>';
                                echo "</fieldset>";
                            }elseif($_SESSION['perfil']==2){
                                echo "<fieldset style='border: 1px solid black;'>";
                                echo "<p style='font-size:10px'>Moderador</p>";
                                echo '<p><a class="btn btn-default" href="./paginas/aumentarUnidades.php?codigo='.$value["codigo"].' role="button">Aumentar unidades»</a></p>';
                                echo "</fieldset>";
                            }
                    }
                    echo '<a  href="./paginas/comprarProducto.php?codigo='.$value["codigo"].'"><button class="btn btn-primary boton">Comprar</button></a>';

                    ?></div><?php

                }
                }
            }else{
                echo $resultado."<br>";
                echo "<p><a href='./paginas/ejecutarScript.php'>Establecer datos iniciales</a></p>";
                echo "<p>Usuario disponibles: <br>";
                echo "Usuario:admin | Pass:adminAd1 <br>";
                echo "Usuario:moderador | Pass:moderadorMo1 <br>";
                echo "Usuario:usuario | Pass:usuarioUs1 </p>";
            }
            ?>
    </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>