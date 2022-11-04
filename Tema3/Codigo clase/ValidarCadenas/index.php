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
        <h2><center>Funciones y Formularios</center></h2>
        <div class="row">
            <?php
            $cadena= 'Hoy hace muy buen día y hay nubes';
            /**
             * Los patrones se escriben como string pero al inicio y final deben llevar /
             * Match: solo verdadero o falso
             */
            $patron ='/hace/';
            echo "<br> Cadena: ".$cadena.". y patron ".$patron. ". Match ".preg_match($patron,$cadena);

            //patron comodin, despues de ha que haya cualquier caracter
            //Match no nos dice cuantas veces, sino que está ese patron
            $patronComodin='/ha./';
            echo "<br> Cadena: ".$cadena.". y patron ".$patron. ". Match ".preg_match($patronComodin,$cadena); 

            //Si el patron tiene "ha comodin y caracter especial \s" el punto es una cosa solo
            $patronComodin='/ha.\s/';//solo sacará hay. Hay ha+cualquiercosa+espacio
            echo "<br> Cadena: ".$cadena." y patron ".$patron. ". Match ".preg_match($patronComodin,$cadena); 

            
            //hay o hoy
            $patronComodin='/h[o|a]y]/';
            echo "<br> Cadena: ".$cadena.". y patron ".$patron. ". Match ".preg_match($patronComodin,$cadena); 

            /**
             * no hace falta la barra cuando es solo un caracter, si cuando son varios....
             */
            
            $mes='Noviembre';
            $mes1='November';
            $mes2='Nov.';
            $patron ='/Nov[.|ember|iembre]]/';
            echo "<br> Cadena: ".$mes." y patron ".$patron. "  Match ".preg_match($patron,$mes); 
            echo "<br> Cadena: ".$mes1." y patron ".$patron. " Match ".preg_match($patron,$mes1); 
            echo "<br> Cadena: ".$mes2." y patron ".$patron. " Match ".preg_match($patron,$mes2); 


            $mes='Noviembrea';
            $mes1='November';
            $mes2='aNov.';
            $patron ='/^Nov[.|ember|iembre]$/';
            echo "<br> Cadena: ".$mes." y patron ".$patron. " Match ".preg_match($patron,$mes); 
            echo "<br> Cadena: ".$mes1." y patron ".$patron. " Match ".preg_match($patron,$mes1); 
            echo "<br> Cadena: ".$mes2." y patron ".$patron. " Match ".preg_match($patron,$mes2); 

            /**
             * hay páginas para probar expresiones regex101.com
             */

            /**
              * que sea algo opcional 
              * con ?: será 0 o una
              * con *: de 0 a mas veces
              */


              $patron ='/log[0-9]*.log/';
              $cadena='log.log';
              $cadena1='log1.log';
              $cadena2='log125.log';
              echo "<br> Cadena: ".$cadena." y patron ".$patron. " Match ".preg_match($patron,$cadena);
              echo "<br> Cadena: ".$cadena1." y patron ".$patron. " Match ".preg_match($patron,$cadena1); 
              echo "<br> Cadena: ".$cadena2." y patron ".$patron. " Match ".preg_match($patron,$cadena2); 

              /**
               * IBAN válido
               *    lleva PAIS 2 letras 
               *        4 numero entidad
               *        4 numero oficina
               *        2 numero de control
               *        10 numero de cuenta
               * (\s)? el espacio es opcional
               */

              $patron ='/^[A-Z]{2}[0-9]{2}(\s)?[0-9]{4}(\s)?[0-9]{4}(\s)?[0-9]{2}(\s)?[0-9]{10}$/';
              $cadena ='ES6621000418401234567981';
              $cadena2 = 'ES66 2100 0418 40 1234567981';

              echo "<br> Cadena: ".$cadena." y patron ".$patron. " Match ".preg_match($patron,$cadena); 
              echo "<br> Cadena: ".$cadena2." y patron ".$patron. " Match ".preg_match($patron,$cadena2); 

              /**
               * Valor numerico entre 0-999
               */

      
              $cadena = '0';
              $cadena1 = 'a';
              $cadena2 = '1000';
              $cadena3 = '236';

              $patron = '/^[0-9]{1,3}$/';
              echo "<br> Cadena: ".$cadena." y patron ".$patron. " Match ".preg_match($patron,$cadena); 
              echo "<br> Cadena: ".$cadena1." y patron ".$patron. " Match ".preg_match($patron,$cadena1); 
              echo "<br> Cadena: ".$cadena2." y patron ".$patron. " Match ".preg_match($patron,$cadena2); 
              echo "<br> Cadena: ".$cadena3." y patron ".$patron. " Match ".preg_match($patron,$cadena3); 

              /**
                * \d y \D
                * permitimos digitos o solo letras
                */
                //digito
                $patron = '/^d{1,3}$/';

                //Cualquier letra minuscula y mayuscula
                $patron = '/^D{1,3}$/';


                /**
                 * Etiqueta de apertura o de cierre
                 * March con <html> <h3> </html> </h3>
                 * 
                 * (\s)? el espacio es opcional
                 * 
                 * Tambien que devuelva donde ha hecho match
                 */
                /**
                 * de todo lo que hay devuelveme donde
                 * rellena el array de donde ha hecho match
                 * preg_match_all($patron,$cadena,$array):
                 */
                //$patron='/^<(/)D>$/';
                $patron='/<\/?[a-z]+[0-9]?>/';
                $cadena= "<html>Dentro de una html</html>
                <a>Dentro del enlace</a>
                <h1>Dentro de una h1</h1>";

                echo "<br> Cadena: ".$cadena." y patron ".$patron. " Match ".preg_match($patron,$cadena); 
                preg_match_all($patron,$cadena,$array);

                foreach ($array[0] as $value) {
                    echo str_replace('<','&lt',$value)."<br>";

                }

                

                  /**
                 * quiero que me  de lo que está dentro de estas etiquetas
                 * <html>Dentro de una html</html>
                 * dos array uno: desde loq ue me has puesto esto es lo que hay
                 * dsegundo: lo que tengo entre parentesis
                 * pueden ser buscar datos en etiquetas html, xml, json(existe encode, decode)
                 */

                $patron='/<[a-z]+[0-9]?> (.*)<\/[a-z]+[0-9]?>/';
                $cadena= "<html>Dentro de una html</html>
                <a>Dentro del enlace</a>
                <h1>Dentro de una h1</h1>";

                echo "<br> Cadena: ".$cadena." y patron ".$patron. " Match ".preg_match($patron,$cadena); 

                preg_match_all($patron,$cadena,$array);

               echo ("dentro de etiqueta");


                echo "<h1>expresiones regulares en array preg_grep(patron,lista)</h1>";
               /**
                * expresiones regulares en array
                * si quiero que me conteste en que posición existe ese patron 
                */
                $lista = array('Maria','Criado','25','Zamora', 'Calle Requejo 25');
                //busco la edad
                $patron='/^\d{1,3}$/';

                $numero=preg_grep($patron,$lista);//lo devuelve en un array
                print_r($numero);


                echo "<h1>expresiones regulares en array preg_replace(patron,sustituir,lista)</h1>";
                /**
                 * sustituir 
                 */
                echo "<br>";
                $sustituir='numero';
                $cambiado = preg_replace($patron,$sustituir,$lista);
                print_r($cambiado);
                
        ?>
      </div>
    </div>
    

    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
    
</body></html>
