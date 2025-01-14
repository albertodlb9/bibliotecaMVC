<h1>Insertar autor</h1>
    <form action="index.php?controller=autorController&action=insertarAutor" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
        <br>
        <label for="nacionalidad">Nacionalidad</label>
        <input type="text" name="nacionalidad" id="nacionalidad">
        <br>
        <input type="submit" name="Insertar" value="Insertar">
    </form>
