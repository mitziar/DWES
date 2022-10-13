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
        <h2><center>Operadores</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../">Tema 3</a><a href="index.html">/Código de clase</a>/Operadores, bucles, etc.</h4>
        </div>
      <!-- Example row of columns -->
        <div class="row">


            <h2>Nave espacial</h2>
            <?php
            $a ="b";
            $b ="a";

            var_dump($a <=> $b);

            $a=5;
            $b=1;
            echo "<br>Logicos";

            var_dump($a & $b);
            echo "<br>";
            var_dump($a << $b);

            echo "<br>";
            var_dump($a << $b);

            echo "<h2>Tomas de decisiones</h2>";
            /**
             * que el algoritmo vaya por un camino o vaya por otro. Lo que es el flujo. Cada vez que tomammos una decisión se cambia
             * el flujo del programa 
             * 
             * -condicional: if, (si)
             * go to: no se usa, ya hay funciones
             * 
             * -condicional: if, (si) else (sino)
             * 
             * if, (si) else if (sino si) else (sino)
             * 
             * 
             * //////////////////////
             * switch (valor)
             * si no pongo break, entra en todas. Continue es también 
             */
            echo "<br>";

            switch ($a){
                case 1:
                    echo "es 1 <br>";
                    break;
                case 2:
                    echo "es 2 <br>";
                    break;
                default:
                    echo "es otra <br>";
                    break;
                        
            }
            ?>
            <h2>BUCLES</h2>
            <?php
            //ejemplo de break: sale del bucle
            //cuando llegue a 5 se sale
            for ($i=0;$i<10;$i++){
                    echo "<br>".$i;

                    if($i==5)
                    break;   
            }

            //ejemplo de continue: sale del bucle
            //No imprima el 5
            for ($i=0;$i<10;$i++){

                if($i==5)
                continue;//de aquí para abajo no hace nada, vuelve a entrar con i=6

                echo "<br>".$i;
            }

            //while: se ejecuta tantas veces mientras se cumpla la condicion

            $a=1;
            while($a>5)//se ejecuta infinito
            echo "<br>".$a;


            $a=1;
            while($a>5)//se ejecuta 4 veces
            {echo "<br>".$a;
                $a++;
            }

            $a=1;
            do{//se ejecuta al menos una vez, eso lo diferencia
                echo "<br>".$a;
                $a++;
            }while($a <=5);

            /***************************
             * Ejercicio que muestre
                 *
                 ***
                *****  
            */

            for($a=3;$a<=0;$a--){
                for($i=0;$i<=5;$i++){
                    echo "&nbsp;";
                    if ( $a==$i){
                        echo "*";
                    }
                }
            }
            ?>
        </div>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>