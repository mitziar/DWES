<?php
if(isset($_SESSION['error']))
{
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
echo "<h1>Mi perfil</h1>";
if($_SESSION['user']){
    $usuario=UsuarioDao::findByUser($_SESSION['user']);
    if($usuario){?>
        <div class="card mb-3 text-center" style="max-width: 450px;"> 
        <!-- <div class="row"> -->
            <div class="col-md-8">
                <div class="card-body text-center">
                    <h5 class="card-title">Usuario <?echo $usuario->usuario?></h5>
                    <p class="card-text text-center">Contraseña: </p><input type="password" required name="contraseña" >
                    <p class="card-text text-left">Email: <?echo $usuario->email?><input type="email" required name="email" value=<?echo $usuario->email?>></p>
                    <p class="card-text text-left">Fecha de nacimiento: <?echo $usuario->fecha?><input required type="date" name="fecha" value=<?echo $usuario->fecha?> ></p>
                    <p class="card-text text-left">Código Rol: <?echo $usuario->codigo?><input type="number"  readonly name="codigo" value=<?echo $usuario->codigo?>></p>
                    <a href="./index.php?home=home"><input type = 'button' class="btn m-2 btn-secondary w-100" value="Volver"></a>
                    <input type='submit' href="./index.php" class="btn m-2 btn-secondary w-100" value = 'Modificar' name ='modificarUsuario'>
                </div>
            </div>
        <!-- <div> -->
    </div>
    <?}

}else{
    $_SESSION['No se puede modifcar el usuario'];
}
?>