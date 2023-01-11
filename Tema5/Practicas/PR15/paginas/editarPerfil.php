<html lang="en">
    <?php
    session_start();
    include ("../funciones/funciones.php");
    include ("../funciones/bd.php");
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
<link rel="stylesheet" href="../css/estilos.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<link rel="stylesheet" href="../css/estilosEditar.css">
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
                    echo "<a class='claseTransicion' href='./verAlbaranes.php'>Albaranes</a>";
                    echo "<a class='claseTransicion'href='./verVentas.php'>Ventas</a>";
                    echo "<a class='claseTransicion' href='./insertarProducto.php'>Almacen</a>";
                    break;
                case 2:
                    //moderador
                    echo "<a class='claseTransicion' href='../index.php'>Index</a>";
                    echo "<a class='claseTransicion' href='./verAlbaranes.php'>Albaranes</a>";
                    echo "<a class='claseTransicion' href='./verVentas.php'>Ventas</a>";
                    break;
                case 3:
                    //usuario normal
                    echo "<a class='claseTransicion' href='../index.php'>Index</a>";
                    echo "<a class='claseTransicion' href='./verVentas.php'>Mis compras</a>";
                    break;
                default:
                break;
            }
            echo "</nav>";
            }?>
            
       </div>
        <?php
        if(enviado() && validado2()){
            if(editarUsuario($_REQUEST['user'],$_REQUEST['pass'],$_REQUEST['email'],$_REQUEST['fecha'])){

                header('Location:../index.php');
                exit();

            }else{
                $_SESSION['error']= "No se ha podido editar los datos del usuario";
                header('Location:../index.php');
                exit();
            }

        }else{
            echo "<h2>Editar los datos de usuario</h2>";
            $fila=obtenerUser($_SESSION['user']);
        ?>
        <form action="./editarPerfil.php" method="post">

        <label for="user">Usuario </label>
        <input type="text" readonly name="user" id="user" value="<?php echo $_SESSION['user'].'">';?>
        <br>

        <label for="pass">Contraseña </label>
        <input type="password" name="pass" id="pass" value="<?php
        if(enviado()){

            if(vacio('pass')){
            echo '">';
            echo '<span>Introduzca contraseña</span>';
            }else{
                if(!contraseñaValida($_REQUEST['pass'])){
                    echo '">';
                    echo '<span>Contraseña inválida. Debe contener mínimo 8 caracteres y al final una mayúscula, una minúscula y un número</span>';
                }else{
                    echo $_REQUEST['pass'].'">';
                }
            }
        }else{
            echo $fila['contraseña'].'">';
        }
        ?>
        <br>
        <label for="pass2">Repetir contraseña </label>
        <input type="password" name="pass2" id="pass2" value="<?php
        if(enviado()){

            if(vacio('pass2')){
            echo '">';
            echo '<span>Introduzca la confirmación de la contraseña.</span>';
            }else{
                if($_REQUEST['pass2'] != $_REQUEST['pass']){
                    echo '">';
                    echo '<span>Contraseña inválida. Las contraseñas no son iguales.</span>';
                }else{
                    echo $_REQUEST['pass2'].'">';
                }
            }
        }else{
            echo $fila['contraseña'].'">';
        }
        ?>
        <br>
        <label for="email">Email </label>
        <input type="text" name="email" id="email" placeholder="alguien@email.com" value="<?php
        if(enviado()){

            if(vacio('email')){
            echo '">';
            echo '<span>Introduzca email</span>';
            }else{
                if(!emailValido($_REQUEST['email'])){
                    echo '">';
                    echo '<span>Email inválido.</span>';
                }else{
                    echo $_REQUEST['email'].'">';
                }
            }
        }else{
            echo $fila['email'].'">';
        }
        ?>
        <br>
        <label for="fecha">Fecha nacimiento </label>
        <input type="text" name="fecha" id="fecha" placeholder="AAAA-MM-DD" value="<?php
        if(enviado()){

            if(vacio('fecha')){
            echo '">';
            echo '<span>Introduzca fecha</span>';
            }else{
                if(!fechaValida($_REQUEST['fecha'])){
                    echo '">';
                    echo '<span>Fecha inválida. Ejemplo de fecha válida: 2023-01-04</span>';
                }else{
                    echo $_REQUEST['fecha'].'">';
                }
            }
        }else{
            echo $fila['fecha'].'">';
        }
        ?>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form><?php
        }
        ?>
    </div>
      </div> <!-- /container -->
      <footer class="container" style="background-color: bisque;">
        <p><center>Página de Itziar</center></p>
      </footer>
    
</body></html>