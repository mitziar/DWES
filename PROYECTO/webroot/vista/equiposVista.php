<div class="container">
    <div class="row">
        <form action="index.php" method="POST" class="col-md-4">
            <button type="submit" name="nuevoEquipo" class="btn btn-outline-dark">Nuevo Equipo</button>
        </form>
        <form class="col-md-4">
            <label>Buscar</label>
            <select class="form-control select2">
                <option>Select</option>
                <option>Car</option>
                <option>Bike</option>
                <option>Scooter</option>
                <option>Cycle</option>
                <option>Horse</option>
            </select>
        </form>
    </div>
</div>

<table class="table table-responsive" id="idTabla">
    <thead>
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Equipo</th>
            <th scope="col">Características</th>
            <th scope="col">Estado</th>
            <th scope="col">Imagen QR</th>
            <th scope="col">Incidencia</th>
            <th scope="col">Solicitar</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<script src="./webroot/javascript/equipo.js"></script>