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
        if(isset($_GET['msg'])){
            echo "<h2 class='instalacion'>".$_GET['msg']."</h2>";
        }
        ?>
        <h1>Bienvenido a la biblioteca 2.0</h1>
    
        <form action="" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario">
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
            <br>
            <div class="entrar">
                <input type="submit" name="enviar" value="Entrar" class="entrar">
                <button class="registrar"><a href="registro.php">Registrate</a></button>
            </div>
        </form>

</body>
</html>