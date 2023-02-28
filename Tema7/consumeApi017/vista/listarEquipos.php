<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi pagina</title>
    <link rel="stylesheet" href="../webroot/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
      </header>

      <?include ('../vista/nav.php');?>
      <main class="container"> 
      <a href="./equiposControlador.php?accion=nuevoEquipo"><button>Nuevo Equipo</button></a>
        <form method='POST' action="../controlador/equiposControlador.php">
            <label for="idEquipo">Introduzca código de equipo</label>
            <input type="number" min=1 step=1 required name="idEquipo" id="idEquipo">
            <input type="submit" name="accion" value="Buscar Equipo">
        </form>
        <div class=row>
    
</div>
<div class=row>

<?
if($lista!=null){?>
<table>
    <tr>
      <th>Código Equipo</th><th>Nombre</th><th>Localidad</th><th>Modificar</th><th>Eliminar</th>
  </tr><?
  foreach ($lista as $key => $value) {
    echo "<tr>";
    foreach($value as $k => $v){
        echo "<td>".$v."</td>";
    }
    echo "<td><a href='./equiposControlador.php?accion=modificarEquipo&idEquipo=".$value['codEquipo']."'>Modificar</a></td>";
    echo "<td><a href='./equiposControlador.php?accion=eliminarEquipo&idEquipo=".$value['codEquipo']."'>Eliminar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}else{
  
  echo "No existe equipo con ese código";
}

?>

</div>
      </main>

      <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">

          <span class="mb-3 mb-md-0 ">Consume API Equipos y Jugadores</span>

      </footer>
</body>
</html>