<?php
if(isset($_SESSION['error']))
{
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}?>

<h1>Insertar Usuario</h1>
        <div class="card mb-3 " style="max-width: 540px;"> 
        <div class="row">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nuevo usuario</h5>
                    <form action="./index.php" method="POST" enctype="multipart/form-data">
                    <p class="card-text text-left">Usuario:<input type="text" required name="usuario" >
                    <p class="card-text text-left">Contraseña: </p><input type="password" required name="contraseña" >
                    <p class="card-text text-left">Repite contraseña: </p><input type="password" required name="contraseña2" >
                    <p class="card-text text-left">Email: <input type="email" required name="email"></p>
                    <p class="card-text text-left">Fecha de nacimiento: <input required type="date" name="fecha"></p>
                    <p class="card-text text-left">Código Rol: <input type="number" readonly name="codigo" value='3'></p>
                    <a href="./index.php?home=home"><input type = 'button' class="btn m-2 btn-secondary w-100" value="Volver"></a>
                    <input type='submit' href="./index.php" class="btn m-2 btn-secondary w-100" value = 'Registrar' name ='guardarNuevo'>
                    </form>
                </div>
            </div>
        <div>
    </div>