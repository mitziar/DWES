<div class='container'>
    <div class='row justify-content-center error'>
        <?
            if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            }
        ?>
    </div>
    <h1>Entrar como usuario</h1>;
    <div class='row justify-content-center m-3'>
        <form action="./index.php" method="post">
            <label for="user">Usuario</label>
            <input type="text" name="user" id="user">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="pass">
            <?if(isset($_REQUEST['codigoProducto'])){
                echo '<input type="hidden" value="'.$_REQUEST['codigoProducto'].'" name="enviar" class="btn btn-primary m-3">';
            }
            ?>
            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary m-3">
        </form>
    </div>
</div>