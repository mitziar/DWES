<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Claudio Moyano</title>
    <script src="./webroot/javascript/conf.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <header class="d-flex flex-wrap align-items-center  py-3 mb-4 border-bottom">
        
        <div class="col-md-3 text-left">
          <a href="./index.php?home=home">
            <img src="./webroot/imagenes/logo.PNG" alt="Claudio Moyano">
          </a>
          
        </div>
        <div class="col-md-6 text-center">
        <h1>Gestor de Inventario</h1>
        </div>
        
        <?php  if (estaValidado()) {?>
        <div class="col-md-3 text-end">
        
        <form action="./index.php" method="POST">

          <div class="text-end me-3"><h5><?php echo $_SESSION['user']?></h5></div>
          <input type="submit" name="miperfil" class="btn btn-outline-secondary me-2" value="Mi perfil">
          <input type="submit" name="logout" class="btn btn-outline-secondary me-2" value="Logout">

          <?php
         }?>
        </div>
        </form>
      </header>
      <?php if (estaValidado()) { ?>
      
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="./index.php?home=home">Home</a>
                    </li>
                  <?php
                  if (esAdmin()) {?>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php?verVenta">Ventas</a>
                    </li>
                  <li class="nav-item">
                    <a class="nav-link  active" href="./index.php?albaran=albaran" href="./index.php?albaranes=albaranes">Albaranes</a>
                  </li>
                  <li>
                    <a class="nav-link  active" href="./index.php?administrarProductos=administrarProductos">Productos</a>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
      </nav>
      <?php } ?>
      <?php
          if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_SESSION['error'];
            echo '</div>';
            unset($_SESSION['error']);
          }
          if (isset($_SESSION['acieto'])) {
            echo '<div class="alert alert-success" role="alert">';
            echo $_SESSION['acierto'];
            echo '</div>';
            unset($_SESSION['acierto']);
          }
      ?>
      <main class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4">

      <?php

            echo '<div class="row align-items-center">';
            require_once $_SESSION['vista'];
            echo '</div>';

        ?>

      </main>

      <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">

        <span class="mb-3 mb-md-0 ">Proyecto Fin de Ciclo</span>

      </footer>
</body>
</html>