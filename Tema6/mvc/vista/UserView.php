<?
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);

    }
    
    //puedo usar ver VER O EDITAR
    ?>

    <form action="./index.php" method="post">
    <label for="user">Usuario</label>
    <input type="text" name="user" id="user" value=<?echo $usuario->usuario?>>
    <label for="user">Nombre</label>
    <input type="text" name="nombre" id="nombre" value=<?echo $usuario->nombre?>>


    <?if($accion == 'editar'){?>
    <label for="pass">Contraseña</label>
    <input type="password" name="pass" id="pass">
    <label for="pass">Repite contraseña</label>
    <input type="password" name="pass" id="pass">
    }?>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value=<?echo $usuario->correo?>>  
    <input type="password" name="pass" id="pass">
    <label for="perfil">Perfil</label>
    <input type="text" name="perfil" id="perfil" value=<?echo $usuario->perfil?>>

    <?if($_SESSION['accion']=='editar'){?>
        <input type="submit" value="Guardar" name="guardar">
    <?}else{?>
        <input type="submit" value="Editar" name="editar">
    }
    

    //si es guardar ver que coincide la contraseña
</form>
