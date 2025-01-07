<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca 2.0</title>
    <link rel="stylesheet" href="./style.css">
    <link type="image/png" sizes="16x16" rel="icon" href="./imagenes/icons8-libro-16.png">
</head>
<body>
    <?php
    require_once 'controladores/seguridad.php';
    $seguridad = new Seguridad();
    ?>

        <h1>Bienvenido a la biblioteca 2.0</h1>
        <nav id='menu'>
            <ul>
        <li><a href="listadoLibros.php">Listado de libros</a></li>
        <li><a href="cambiarPassword.php">Cambiar contraseña</a></li>
        <li><a href="modificarPerfil.php">Modificar mis datos</a></li>
        <?php
            if($seguridad->acceso('bibliotecario')){
        ?>
        <li><a href="listadoAutores.php">Listado de autores</a></li>
        <li><a href="insertarLibro.php">Insertar libro</a></li>
        <?php
            }
            if($seguridad->acceso('administrador')){
        ?>
        <li><a href="gestionUsuarios.php">Gestion de usuarios</a></li>
        <?php
            }
            echo "<li><a href='cerrarSesion.php'>Cerrar sesion</a></li>";
        ?>
        </ul>
        </nav>
</body>
</html>
