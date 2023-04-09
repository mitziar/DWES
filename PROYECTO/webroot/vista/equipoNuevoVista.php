<h1>Nuevo Equipo</h1>
<div class="container">
  <div class="row">
  <form action="index.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="idEquipo">Equipo</label>
        <input type="text" class="form-control" id="idEquipo" name="equipo" placeholder="Introduzca equipo" required>
      </div><br>
      <div class="form-group">
        <label for="idCaracteristicasEquipo">Características del equipo</label>
        <textarea class="form-control" id="idCaracteristicasEquipo" name="caracteristicas" maxlength="500" rows="3" required></textarea>
      </div><br>
      <div class="form-group">
        <label for="idSelectCategoria">Seleccione categoria</label>
        <select id="idSelectCategoria" name="categoria" id="idSelectCategoria" class="form-control select2" required>
        </select>
      </div><br>
      <div class="form-group">
        <label for="idImagenEquipo">Imagen</label>
        <input type="file" class="form-control-file" name="imagen" id="idImagenEquipo" required>
      </div><br>
      <div class="form-group">
        <label for="idImagenQR">Imagen_QR</label>
        <input type="file" class="form-control-file" name="imagen_QR" id="idImagenQR" required>
      </div><br>
      <div class="form-group">
        <label for="generarCodigo">Imagen QR</label>
        <span name="botonGenerarQR" id="generarCodigo" class="btn btn-outline-dark">Generar QR</span>
        <a href="#" id="descargarCodigo" class="btn btn-outline-dark" style="display:none">Descargar QR</a>
        <div id="codigoQR" name="codigoQR"></div>
      </div><br>

      <button type="submit" id="idInsertarEquipo" name="insertarEquipo" class="btn btn-outline-dark" style="display:none" value="insertarEquipo">Guardar equipo</button>
    </form>
  </div>
</div>
<script src="./webroot/javascript/qr/jquery.min.js"></script>
<script src="./webroot/javascript/qr/qrcode.js"></script>
<script src="./webroot/javascript/main.js"></script>
<script src="./webroot/javascript/equipoNuevo.js"></script>