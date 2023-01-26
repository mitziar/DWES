<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiempo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
  <body>
    <h1>El tiempo</h1>
    <form method="get" action='./pedirAcuWheather.php'>
    <label for="provincia">Elige provincia:</label>

    <select name="provincia" id="provincia">
        <option value="Leon Castilla y León">Leon</option>
        <option value="Zamora Castilla y León">Zamora</option>
        <option value="Valladolid Castilla y León">Valladolid</option>
        <option value="Burgos Castilla y León">Burgos</option>
        <option value="Palencia Castilla y León">Palencia</option>
    </select>
    </form>

  </body>
</html>