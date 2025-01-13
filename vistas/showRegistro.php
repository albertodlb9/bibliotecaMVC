
    <h2>Registro de usuario</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar" id="avatar">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="registrar" value="registrar">
    </form>
