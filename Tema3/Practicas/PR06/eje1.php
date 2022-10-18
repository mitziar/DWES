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
        <h2><center>Ejercicio 1</center></h2>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a><a href="index.html">/PR06</a>/Ejercicio 1</h4>
        </div>
      <!-- Example row of columns -->
    <div class="row">
    <pre>
    Liga
    </pre>
    <?php
        $liga =
        array(
            "Zamora" =>  array(
                "Salamanca" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
                )
            ),
            "Salamanca" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
                )
            ),
            "Avila" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
                ),
                "Salamanca" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
                )
            ),
            "Valladolid" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Salamanca" => array(
                    "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
                )
            ),
        );
        echo "<table border='1'><tr><th>Equipos</th>";
        $contador=0;
        $locales=array();
            
        //pintar cabeceras
        foreach ($liga as $key => $value) {            
            echo "<th>".$key."</th>";
            $locales[$contador]=$key;
            $contador++;
        }
        echo "</tr>";
        $contador=0;
        foreach ($liga as $key => $local) {
            echo "<tr><td>".$key."</td>";
            $contador=0;
            foreach ($local as $clave => $visitante) {
                if($key==$locales[$contador])
                    {
                        echo "<td></td>";
                        
                    }
                    echo "<td>";
                foreach ($visitante as $k => $v) {

                        echo "<p>";
                         echo $v;
                         echo "</p>";
               }
               echo "</td>";
               $contador++;
            }
            echo "</tr>";
        }
        echo "</table>";

        $resultados=array();
        foreach ($liga as $key => $local) {           
                    $resultados[$key]= array("puntos"=>0,"gF"=>0,"gC"=>0);  
        }

        echo "<table border='1'><tr><th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th></tr>";
         
        foreach ($resultados as $clave => $value)
        {
             echo "<tr>";
             echo "<td>".$clave."</td>";

             foreach ($value as $key => $value) {
                echo "<td>".$value."</td>";
             }
             echo"</tr>";

            }
        echo "</table>";


        foreach ($liga as $local => $partidos) {    
       
            foreach ($partidos as $visitante => $resultadosP) {
                    $goles=explode("-",$resultadosP["Resultado"]);
                    if($goles[0]>$goles[1]){
                        $resultados[$local]["puntos"]+=3;
                    }else if($goles[0]<$goles[1]){
                        
                    }else{
                        $resultados[$local]["puntos"]+=1;
                    }
                    $resultados[$local]["gF"]+=$goles[0];
                    $resultados[$local]["gC"]+=$goles[1];
            }
        }

        echo "<table border='1'><tr><th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th></tr>";
         
        foreach ($resultados as $clave => $value)
        {
             echo "<tr>";
             echo "<td>".$clave."</td>";

             foreach ($value as $key => $value) {
                echo "<td>".$value."</td>";
             }
             echo"</tr>";

            }
        echo "</table>";

            




         
    ?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>