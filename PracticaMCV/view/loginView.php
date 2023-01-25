<div class='container'>
    <div class='row justify-content-center error'>
        <?
            if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            }
        ?>
    </div>
    <div class='row justify-content-center m-3'>
        <form action="./index.php" method="post">
            <label for="user">Usuario</label>
            <input type="text" name="user" id="user">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="pass">
            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary m-3">
        </form>
    </div>
</div>