
<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['nombre'])){
        header('Location: index.php?controller=homeController&action=logeado');
    }
?>
<form action="index.php?action=index&controller=homeController" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario">
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">
    <br>
    <div class="entrar">
        <input type="submit" name="enviar" value="Entrar" class="entrar">
        <button class="registrar"><a href="index.php?controller=usuarioController&action=registro">Registrate</a></button>     
    </div>
</form>

