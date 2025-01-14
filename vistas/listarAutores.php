
<div class="tabla">
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Nacionalidad</th>
        </tr>
        <?php
            $autores = new Autor();
            foreach($data as $autor){
                echo "<tr>";
                echo "<td>".$autor["Nombre"]."</td>";
                echo "<td>".$autor["Apellidos"]."</td>";
                echo "<td>".$autor["Pais"]."</td>";
                echo "<td><a href='index.php?controller=autorController&action=modificarAutor&data=".$autor["idAutor"]."'>Modificar</a> <a href='index.php?controller=autorController&action=borrarAutor&data=".$autor["idAutor"]."'>Borrar</a></td>";
                echo "</tr>";
            }

        ?>
    </table>
    </div>