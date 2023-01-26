
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
  
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.php?home=home" class="nav-link px-2 link-secondary">Mi Pagina</a></li>
        </ul>
  
        <div class="col-md-3 text-end">
        <form action="./index.php" method="POST"> 
        <?
        if(!estaValidado()){?>
          <input type="submit" name="login" class="btn btn-outline-primary me-2" value="Login">
          <input type="submit" name="registro" class="btn btn-outline-primary me-2" value="Registrarse">

         <?}
         else{
          if(esAdmin()){
            ?>
           <input type="submit" name="admProducto" class="btn btn-outline-primary me-2" value="Administrar Productos">
           <?
          }
          ?>
          <h2><?echo $_SESSION['user']?></h2>
          <input type="submit" name="miperfil" class="btn btn-outline-primary me-2" value="Mi perfil">
        
          <input type="submit" name="logout" class="btn btn-outline-primary me-2" value="Logout">
         <?
         } ?>

        </div>
      </header>
      <main class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4"> 
              <? 
                echo '<div class="row align-items-center">';
                require_once $_SESSION['vista'];
                echo '</div>';
              ?> 
      </main>

      <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">

          <span class="mb-3 mb-md-0 ">Tienda de electrodomésticos</span>

      </footer>
</body>
</html>