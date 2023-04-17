<div id="miDiv" style="display: none;"><?php echo $_SESSION['usuario']['codigo_rol']; ?></div>
<div class="container">
    <div class="row">
        <form action="index.php" method="POST" class="col-md-4">
            <button type="submit" name="nuevoEquipo" id="idNuevoEquipo" class="btn btn-outline-dark">Nuevo Equipo</button>
        </form>
        <form class="col-md-4" id="idBuscarEquipos">
            <label>Filtrar equipos</label>
            <select class="form-control select2" id="idBuscar">
            </select>
        </form>
    </div>
</div>
<div id="contenidoEquipos">
</div>

<script src="./webroot/javascript/equipo.js"></script>
