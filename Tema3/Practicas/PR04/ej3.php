<html lang="en"><head>
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
<link rel="stylesheet" href="">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <title>DWES-Itziar</title>

  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../index.html">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>Ejercicio 3</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a><a href="index.html">/PR04</a>/Ejercicio 3</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <pre>
    Realiza un programa utilizando bucles que muestre la siguiente figura teniendo en cuenta el numero de filas que pase el usuario por la URL
    Figura: 
                 *
                * *
               *   *
                * *
                 *
    </pre>
    <?php
        $filas = $_GET['filas'];
        $superior=0;
        $inferiro=0;
        //Calcular las filas del triangulo superior

            $superior=(int)($filas/2+1);
            $inferiro=(int)($filas/2);

        //recorrer superior
        for ($i=1;$i<=$superior;$i++){
            //escribir los espacios tiene que se igual al numero de filas menos la fila en la que estoy
            for($blanco=1; $blanco<=$superior-$i;$blanco++){
                echo "&nbsp;";
            }
            //en el for tengo que sumar de dos en dos
            for($asterisco=0;$asterisco<=$i*2-1;$asterisco+=2)
            {
                if($i>2 && $asterisco>0 && $asterisco<$i*2-1){

                    echo "&nbsp;";
                }else{
                    echo "*";
                }
            }
            echo "<br>";
        }
        //recorrer inferior
        for ($i=1;$i<=$inferiro;$i++){
            //escribir los espacios tiene que se igual al numero de filas menos la fila en la que estoy
            for($blanco=1; $blanco<=$i*2-1;$blanco+=2){
                echo "&nbsp;";
            }
            //en el for tengo que sumar de dos en dos
            for($asterisco=0;$asterisco<=$inferiro-$i;$asterisco++)
            {
                if($i<2 && ($asterisco>0 && $asterisco < $inferiro-$i)){
                    echo "&nbsp;";
                }else{
                    echo "*";
                }
            }  
            echo "<br>";
        }
           
    ?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>
