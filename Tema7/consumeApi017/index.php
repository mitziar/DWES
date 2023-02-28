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

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="./controlador/equiposControlador.php?accion=listar">Equipos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="./controlador/jugadorControlador.php?accion=listar">Jugadores</a>
                    </li>
                </ul>
              </div>
            </div>
      </nav>
      
      <main class="container"> 
              <? 
                echo '<div class="row">';
                echo "<h4>Equipos</h4>";
                require_once ("./controlador/equiposControlador.php");
                echo '</div>';
                echo '<hr>';
              ?> 
              <? 
                echo '<div class="row">';
                echo "<h4>Jugadores</h4>";
                require_once ("./controlador/jugadorControlador.php");
                echo '</div>';
              ?> 
      </main>

      <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">

          <span class="mb-3 mb-md-0 ">Consume API Equipos y Jugadores</span>

      </footer>
</body>
</html>