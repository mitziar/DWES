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
        <option value="Le%C3%B3n%20Castilla%20y%20Le%C3%B3n">Leon</option>
        <option value="Zamora%20Castilla%20y%20Le%C3%B3n">Zamora</option>
        <option value="Valladolid%20Castilla%20y%20Le%C3%B3n">Valladolid</option>
        <option value="Burgos%20Castilla%20y%20Le%C3%B3n">Burgos</option>
        <option value="Palencia%20Castilla%20y%20Le%C3%B3n">Palencia</option>
        <option value="Soria%20Castilla%20y%20Le%C3%B3n">Soria</option>
        <option value="Segovia%20Castilla%20y%20Le%C3%B3n">Segovia</option>
        <option value="Salamanca%20Castilla%20y%20Le%C3%B3n">Salamanca</option>
    </select>
    <input type="submit" value="Enviar" name="enviar">
    </form>

  </body>
</html>