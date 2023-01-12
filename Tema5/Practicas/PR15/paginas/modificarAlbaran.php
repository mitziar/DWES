<html lang="es">
<?php
session_start();
require('../funciones/bd.php');
require('../funciones/funciones.php');

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
    <link rel="stylesheet" href="../css/estilosModificarAlbaran.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <title>DWES-Itziar</title>


</head>

<body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
        <div class="container">
            <h1><a href="../../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
            <h2>
                <center>Tema 5</center>
            </h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <a href="../../PR15/">PR15/</a>Modificar albaran
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
                    echo "<a class='claseTransicion' href='../index.php'>Index</a>";
                    echo "<a class='claseTransicion' href='./verVentas.php'>Ventas</a>";
                    echo "<a class='claseTransicion' href='./verAlbaranes.php'>Albaranes</a>";
                    echo "<a class='claseTransicion' href='./insertarProducto.php'>Almacen</a>";
                    break;
                break;
            }
            echo "</nav>";
            }?>
            
       </div>
        <div class="row">
            <?php
                if (isset($_SESSION['perfil']) == 1) {

                    if (isset($_REQUEST['borrar'])) {
                        $fila = borrarAlbaran($_REQUEST['borrar']);
                        if ($fila) {
                            header('Location:verAlbaranes.php');
                            exit();
                        }

                    }elseif (isset($_REQUEST['modificar'])) {
                        
                            $fila = verAlbaran($_REQUEST['modificar']);
                            if(count($fila)==0){
                                echo "No hay datos para mostrar";
                            }
                            if (is_array($fila)) {
                                echo '<h2>Modificar Albaran</h2>';
                                echo "<form action='./modificarAlbaran.php' method='post'>";
                                echo "<label>Id</label>";
                                echo "<input type='text' readonly name='id' id='id' value=" . $fila['codigo'] . ">";
                               
                                echo "<label for='fecha'>Fecha </label>";
                                echo "<input type='text' name='fecha' id='fecha' placeholder='AAAA-MM-DD' value=";
    
                                if (enviado()) {
    
                                    if (vacio('fecha')) {
                                        echo '>';
                                        echo '<span>Introduzca fecha</span>';
                                    } else {
                                        if (!fechaValida($_REQUEST['fecha'])) {
                                            echo '">';
                                            echo '<span>Fecha inválida. Ejemplo de fecha válida: 2023-01-04</span>';
                                        } else {
                                            echo $_REQUEST['fecha'] . '>';
                                        }
                                    }
                                } else {
                                    echo $fila['fecha'].'>';
                                }
                                echo "<label for='cantidad'>Cantidad </label>";
                                echo "<input type='text' name='cantidad' id='cantidad' value=";
    
                                if (enviado()) {
    
                                    if (vacio('cantidad')) {
                                        echo '>';
                                        echo '<span>Introduzca cantidad</span>';
                                    } else {
                                        if (!cantidadValida($_REQUEST['cantidad'],$fila['id'])) {
                                            echo '>';
                                            echo '<span>Cantidad inválida.</span>';
                                        } else {
                                            echo $_REQUEST['cantidad'] . '>';
                                        }
                                    }
                                } else {
                                    echo $fila['cantidad'].'>';
                                }
                                
                                echo "<label for='producto'>Producto </label>";
                                echo "<input type='text' name='producto' id='producto' value=";
    
                                if (enviado()) {
    
                                    if (vacio('producto')) {
                                        echo '>';
                                        echo '<span>Introduzca el código de producto</span>';
                                    } else {
                                        if (!productoValido($_REQUEST['producto'])) {
                                            echo '>';
                                            echo '<span>Producto no existe.</span>';
                                        } else {
                                            echo $_REQUEST['producto'] . '>';
                                        }
                                    }
                                } else {
                                    echo $fila['producto'].'>';
                                }
                                echo "<label for='usuario'>Usuario </label>";
                                echo "<input type='text' name='usuario' id='usuario' value=";
    
                                if (enviado()) {
    
                                    if (vacio('usuario')) {
                                        echo '>';
                                        echo '<span>Introduzca usuario.</span>';
                                    } else {
                                        if (!usuarioValido($_REQUEST['usuario'])) {
                                            echo '>';
                                            echo '<span>El usuario no existe.</span>';
                                        } else {
                                            echo $_REQUEST['usuario'] . '>';
                                        }
                                    }
                                } else {
                                    echo $fila['usuario'].'>';
                                }
                                echo '<input type="submit" value="Enviar" id="enviar" name="enviar">';
                                echo "<form>";
                            
                        }
                        
                    }elseif(isset($_REQUEST['enviar'])){
                        if(enviado() && validaModificar()){
                            $resultado=modificarAlbaran($_REQUEST['id'],$_REQUEST['fecha'],$_REQUEST['cantidad'],$_REQUEST['producto'],$_REQUEST['usuario']);
                            if($resultado){
                                header('Location:verAlbaranes.php');
                                exit();
                            }else{
                                echo "La venta no se ha modificado";
                            }

                        }else{
                            echo '<h2>Modificar Albaran</h2>';
                            echo "<form action='./modificarAlbaran.php' method='post'>";
                            
                            echo "<label>Id</label>";
                            echo "<input type='text' readonly name='id' id='id' value=" .$_REQUEST['id']. ">";
                           
                            echo "<label for='fecha'>Fecha </label>";
                            echo "<input type='text' name='fecha' id='fecha' placeholder='AAAA-MM-DD' value=";

                            if (enviado()) {

                                if (vacio('fecha')) {
                                    echo ">";
                                    echo '<span>Introduzca fecha</span>';
                                } else {
                                    if (!fechaValida($_REQUEST['fecha'])) {
                                        echo ">";
                                        echo '<span>Fecha inválida. Ejemplo: 2023-01-04</span>';
                                    } else {
                                        echo $_REQUEST['fecha'].">";
                                    }
                                }
                            } else {
                                echo ">";
                            }
                            echo "<label for='cantidad'>Cantidad </label>";
                            echo "<input type='text' name='cantidad' id='cantidad' value=";

                            if (enviado()) {

                                if (vacio('cantidad')) {
                                    echo ">";
                                    echo '<span>Introduzca cantidad</span>';
                                } else {
                                    if (cantidadValida($_REQUEST['cantidad'],$_REQUEST['producto'])) {
                                        echo $_REQUEST['cantidad'].">";
                                    } else {
                                        echo ">";
                                        echo '<span>Cantidad inválida. O producto no asociado.</span>';
                                    }
                                }
                            } else {
                                echo ">";
                            }
                            echo "<label for='precio'>Precio </label>";
                            echo "<input type='text' name='precio' id='precio' value=";

                            if (enviado()) {

                                if (vacio('precio')) {
                                    echo ">";
                                    echo '<span>Introduzca precio</span>';
                                } else {
                                    if (!precioValido($_REQUEST['precio'])) {
                                        echo ">";
                                        echo '<span>Precio incorrecto.</span>';
                                    } else {
                                        echo $_REQUEST['precio'].">";
                                    }
                                }
                            } else {
                                echo ">";
                            }
                            echo "<label for='producto'>Producto </label>";
                            echo "<input type='text' name='producto' id='producto' value=";

                            if (enviado()) {

                                if (vacio('producto')) {
                                    echo ">";
                                    echo '<span>Introduzca el código de producto</span>';
                                } else {
                                    if (!productoValido($_REQUEST['producto'])) {
                                        echo ">";
                                        echo '<span>Producto no existe.</span>';
                                    } else {
                                        echo $_REQUEST['producto'] .">";
                                    }
                                }
                            } else {
                                echo ">";
                            }
                            echo "<label for='usuario'>Usuario </label>";
                            echo "<input type='text' name='usuario' id='usuario' value=";

                            if (enviado()) {

                                if (vacio('usuario')) {
                                    echo ">";
                                    echo '<span>Introduzca usuario.</span>';
                                } else {
                                    if (!usuarioValido($_REQUEST['usuario'])) {
                                        echo '>';
                                        echo '<span>El usuario no existe.</span>';
                                    } else {
                                        echo $_REQUEST['usuario'] . ">";
                                    }
                                }
                            } else {
                                echo "'>";
                            }
                            
                            echo '<input type="submit" value="Enviar" id="enviar" name="enviar">';
                            echo "</form>";
                    
                        }
                    }
                }
                ?>
        </div>

    </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
        <p>
            <center>Página de Itziar</center>
        </p>
    </footer>

</body>

</html>