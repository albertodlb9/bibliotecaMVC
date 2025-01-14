<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!$_SESSION['rol'] == 'bibliotecario'){
        header('Location: index.php');
    }
?>
<h1>Insertar libro</h1>

    <form action="index.php?controller=libroController&action=insertarLibro" method="post">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="autor">Autor</label>
        <select id="autor" name="autor" style="display: inline;">
            <?php
            foreach($data as $autor){
                echo "<option value='".$autor['idAutor']."'>".$autor['Nombre']." ".$autor['Apellidos']."</option>";
            }
        ?>
        </select><button style="display:inline;"><a  href="index.php?controller=autorController&action=insertarAutor">Insertar autor</a></button>
        <br>
        <label for="genero">Genero</label>
        <select id="genero" name="genero">
            <option value="Narrativa">Narrativa</option>
            <option value="Lírica">Lírica</option>
            <option value="Teatro">Teatro</option>
            <option value="Científico-Técnico">Científico-Técnico</option>
        </select>
        <br>
        <label for="nPaginas">Número de páginas</label>
        <input type="number" name="nPaginas" id="nPaginas">
        <br>
        <label for="nEjemplares">Número de ejemplares</label>
        <input type="number" name="nEjemplares" id="nEjemplares">
        <br>
        <input type="submit" name="Insertar" value="Insertar">
    
    </form>
