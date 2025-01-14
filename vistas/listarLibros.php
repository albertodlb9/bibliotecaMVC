<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['nombre'])){
        header('Location: index.php');
    }

?>

<div class="tabla">
        <table>
            <tr>
                <th>Titulo</th>
                <th>Genero</th>
                <th>Autor</th>
                <th>Número de páginas</th>
                <th>Número de ejemplares</th>
            </tr>

            <?php
            foreach($data as $libro){
                $autor = new Autor();
                $autor = $autor->get($libro['idAutor']);
                echo "<tr>";
                echo "<td>".$libro['titulo']."</td>";
                echo "<td>".$libro['genero']."</td>";
                echo "<td>".$autor['Nombre'].' '.$autor['Apellidos']."</td>";
                echo "<td>".$libro['numeroPaginas']."</td>";
                echo "<td>".$libro['numeroEjemplares']."</td>";
                if(true){
                    echo "<td><a href='index.php?controller=libroController&action=modificarLibro&data=".$libro["idLibro"]."'>Modificar</a> <a href='index.php?controller=libroController&action=borrarLibro&data=".$libro["idLibro"]."'>Borrar</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>