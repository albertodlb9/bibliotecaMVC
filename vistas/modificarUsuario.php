<h1>Modificar usuario</h1>

        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(!$_SESSION['rol'] == 'administrador'){
                header('Location: index.php');
            }
            ?>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar" id="">
            <br>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required>
            <br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>" required>
            <br>
            <label for="login">Usuario:</label>
            <input type="text" name="login" id="login" value="<?php echo $login; ?>" required>
            <br>
            <?php
                if($rol !="administrador"){
            ?>
            <label for="rol">Rol:</label>
            <select name="rol" id="rol">
                <option value="registrado" <?php if($rol == 'registrado'){echo 'selected';} ?>>Registrado</option>
                <option value="bibliotecario" <?php if($rol == 'bibliotecario'){echo 'selected';} ?>>Bibliotecario</option>
                <option value="administrador" <?php if($rol == 'administrador'){echo 'selected';} ?>>Administrador</option>
            </select>
            <br>
            <?php
                }else{
                    echo "<input type='hidden' name='rol' value='administrador'>";
                    echo "<br>";
                }
            ?>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña">
            <br>
            <input type="submit" value="Modificar" name="enviar">
        </form>
