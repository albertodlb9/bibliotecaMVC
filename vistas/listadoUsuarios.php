<?php  
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!$_SESSION['rol'] == 'administrador'){
            header('Location: index.php');
        }
?>
<h1>Listado de usuarios</h1>
<table>
    <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php
        foreach($data as $usuario){
            echo "<tr>";
            echo "<td><img width='100px' src='" . $usuario['avatar'] . "'></td>";
            echo "<td>" . $usuario['login'] . "</td>";
            echo "<td>" . $usuario['nombre'] . "</td>";
            echo "<td>" . $usuario['apellidos'] . "</td>";
            echo "<td>" . $usuario['rol'] . "</td>";
            echo "<td><a href='index.php?controller=usuarioController&action=modificarUsuario&data=" . $usuario['login'] . "'>Modificar</a> <a href='index.php?controller=usuarioController&action=borrarUsuario&data=" . $usuario['login'] . "'>Borrar</a></td>";
            echo "</tr>";
        }
    ?>
</table>
