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
<link rel="stylesheet" href="css/estilos.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <title>DWES-Itziar</title>


  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: bisque;">
      <div class="container">
        <h1><a href="../../../../">Desarrollo Web en Entorno Servidor</a></h1>
        <h2><center>FICHEROS CSV Y XML</center></h2>
      </div>
    </div>

    <div class="container">
    <div class="row">
    <h4><a href="../../">Tema 3</a><a href="../">/Prácticas</a><a href='index.php'>/PR11</a>/TransformarFichero.php</h4>
    </div>
    <div class="row">
    <?php
$var='<notas></notas>';
$raiz = new SimpleXMLElement($var);


if(!file_exists('notas.csv')){
   echo "<span>No existe el fichero</span><br>";
}else{
    if(!$fp=fopen('notas.csv','r')){
        echo "<span>No se puede abrir el fichero</span><br>";
   }else{
       

      while($leido=fgetcsv($fp,0,';')){
            $alumno=$raiz->addChild('alumno');
            $alumno->addChild('nombre',$leido[0]);
            $alumno->addChild('nota1',$leido[1]);
            $alumno->addChild('nota2',$leido[2]);
            $alumno->addChild('nota3',$leido[3]);
      }
      fclose($fp);
      if($raiz->asXML('notas.xml')){
        header('Location: ./LeerFicheroXML.php');
        exit();
      }else{
        echo "<br><span>No se ha podido crear el fichero xml</span>";
      }
    }
}
?>
    </div> <!-- /container -->
    <footer class="container" style="background-color: bisque;">
    <p><center>Página de Itziar</center></p>
    </footer>
</body>
</html>