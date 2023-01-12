<html lang="es">
    <?php
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
<link rel="stylesheet" href="../css/estilosAlta.css">
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
            <a href="../../PR15/">PR15/</a>Insertar usuario
        </div>
        <div class="row">
            <nav>
            <a class="claseTransicion" href="../index.php">Index</a>
            </nav>
        </div>
        <?php
        $errores=array();
        
        
        
        if(enviado() && validado()){
            if(altaUsuario($_REQUEST['user'],$_REQUEST['pass'],$_REQUEST['email'],$_REQUEST['fecha'])){

                session_start();
                $_SESSION['user']=$_REQUEST['user'];
                $_SESSION['perfil']=3;
                $_SESSION['validado'];

                header('Location:../index.php');
                exit();

            }else{
                $_SESSION['error']= "No se ha podido realizar el alta de usuario";
                header('Location:../login.php');
                exit();
            }

        }else{
            echo "<div class='contenedor'>";
            
            echo "<h2 class='tituloAlta'>Nuevo usuario</h2>";
            ?>
            <form class="formularioAlta" action="./altaUsuario.php" method="post">
            <label for="user">Usuario </label>
            <input type="text" name="user" id="user" value="<?php
            if(enviado()){

                if(vacio('user')){
                echo '">';
                array_push($errores,'Introduzca usuario');
                }else{
                    if(existeUser($_REQUEST['user'])){
                        echo '">';
                        array_push($errores,'El usuario ya existe');
                    }else{
                        echo $_REQUEST['user'].'">';
                    }
                }
            }else{
                echo '">';
            }
        ?>
            <label for="pass">Contraseña </label>
            <input type="password" name="pass" id="pass" value="<?php
            if(enviado()){

                if(vacio('pass')){
                echo '">';
                array_push($errores,'Introduzca contraseña');
                }else{
                    if(!contraseñaValida($_REQUEST['pass'])){
                        echo '">';
                        array_push($errores,'Contraseña inválida. Debe contener mínimo 8 caracteres y al final una mayúscula, una minúscula y un número');
                    }else{
                        echo $_REQUEST['pass'].'">';
                    }
                }
            }else{
                echo '">';
            }
        ?>
        
        <label for="pass2">Repetir contraseña </label>
        <input type="password" name="pass2" id="pass2" value="<?php
            if(enviado()){

                if(vacio('pass2')){
                echo '">';
                array_push($errores,'Introduzca la confirmación de la contraseña');
                
                }else{
                    if($_REQUEST['pass2'] != $_REQUEST['pass']){
                        echo '">';
                        array_push($errores,'Contraseña inválida. Las contraseñas no son iguales');
                       
                    }else{
                        echo $_REQUEST['pass2'].'">';
                    }
                }
            }else{
                echo '">';
            }
        ?>
        
        <label for="email">Email </label>
        <input type="text" name="email" id="email" placeholder="alguien@email.com" value="<?php
            if(enviado()){

                if(vacio('email')){
                echo '">';
                array_push($errores,'Introduzca email');
                }else{
                    if(!emailValido($_REQUEST['email'])){
                        echo '">';
                        array_push($errores,'Email incorrecto');
                    }else{
                        echo $_REQUEST['email'].'">';
                    }
                }
            }else{
                echo '">';
            }
        ?>
        
        <label for="fecha">Fecha nacimiento </label>
        <input type="text" name="fecha" id="fecha" placeholder="AAAA-MM-DD" value="<?php
            if(enviado()){

                if(vacio('fecha')){
                echo '">';
                array_push($errores,'Introduzca fecha');
                }else{
                    if(!fechaValida($_REQUEST['fecha'])){
                        echo '">';
                        array_push($errores,'Fecha inválida. Ejemplo de fecha válida: 2023-01-04');
                        
                    }else{
                        echo $_REQUEST['fecha'].'">';
                    }
                }
            }else{
                echo '">';
            }
            if(count($errores)>0){
                $_SESSION['errores']=$errores;
            }
            ?>
            
            <input class="enviar" type="submit" value="Enviar" name="enviar">
            </form><?php
            if(isset($_SESSION['errores'])){
                foreach ($_SESSION['errores']  as $value) {
                    echo $value."<br>";
                } 
                unset($_SESSION['errores']);
                echo "<br>";
            }
            }
        ?>
      </div>
      </div> <!-- /container -->
      <footer class="container" style="background-color: bisque;">
        <p><center>Página de Itziar</center></p>
      </footer>
    
</body></html>