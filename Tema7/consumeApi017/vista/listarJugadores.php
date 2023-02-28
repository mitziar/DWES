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
      <a href="./jugadorControlador.php?accion=nuevoJugador"><button>Nuevo Jugador</button></a>
        <form method='POST' action="../controlador/jugadorControlador.php">
          <label>Buscar por id</label><br>
            <label for="idJugador">Introduzca código de jugador</label>
            <input type="number" min=1 step=1 required name="idJugador" id="idJugador">
            <input type="submit" name="accion" value="Buscar Jugador">
        </form>
        <hr>
        <form method='POST' action="../controlador/jugadorControlador.php">
        <label>Buscar por nombre</label><br>
              <label for="nombreJugador">Introduzca nombre de jugador</label>
            <input type="text" required name="nombreJugador" id="nombreJugador">
            <input type="submit" name="accion" value="Buscar Nombre">
        </form>
        <hr>
        <form method='POST' action="../controlador/jugadorControlador.php">
        <label>Buscar por posición</label><br>
              <label for="posicionJugador">Introduzca posición</label>
            <input type="text" required name="posicionJugador" id="posicionJugador">
            <input type="submit" name="accion" value="Buscar Posicion">
        </form>
        <hr>
        <form method='POST' action="../controlador/jugadorControlador.php">
        <label>Buscar por sueldo</label><br>
              <label for="sueldoMinJugador">Introduzca sueldo mínimino</label>
            <input type="numbre" step="0.01" required name="sueldoMinJugador" id="sueldoMinJugador">
            <label for="sueldoMaxJugador">Introduzca sueldo mínimino</label>
            <input type="numbre" step="0.01" required name="sueldoMaxJugador" id="sueldoMaxJugador">
            <input type="submit" name="accion" value="Buscar Sueldo">
          
        </form>
        <hr>
<div class=row>
<h5>Listado jugadores</h5>
<?
if($lista!=null){?>
<table>
    <tr>
      <th>Código Jugador</th><th>Nombre</th><th>Posición</th><th>Sueldo</th><th>Código Equipo</th><th>Modificar</th><th>Eliminar</th>
  </tr><?
  foreach ($lista as $key => $value) {
    echo "<tr>";
    foreach($value as $k => $v){
        echo "<td>".$v."</td>";
    }
    echo "<td><a href='./jugadorControlador.php?accion=modificarJugador&codJugador=".$value['codJugador']."'>Modificar</a></td>";
    echo "<td><a href='./jugadorControlador.php?accion=eliminarJugador&codJugador=".$value['codJugador']."'>Eliminar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}else{
  
  echo "No existe jugador con ese código";
}

?>

</div>
      </main>

      <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">

          <span class="mb-3 mb-md-0 ">Consume API Equipos y Jugadores</span>

      </footer>
</body>
</html>