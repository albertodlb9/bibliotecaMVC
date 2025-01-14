
        <?php
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['nombre'])){
            header('Location: index.php');
        }
            echo "Bienvenido " . $_SESSION['nombre'] . " " . $_SESSION['apellidos'];
            echo "<br>";
            echo "<a href='index.php?controller=usuarioController&action=cerrarSesion'>Cerrar sesión</a>";
        ?>
        <h1>Bienvenido a la biblioteca 2.0</h1>
        <nav id='menu'>
            <ul>
                <li><a href="index.php?controller=libroController&action=listarLibros">Listado de libros</a></li>
                <li><a href="index.php?controller=autorController&action=listarAutores">Listado de autores</a></li>
                <li><a href="modificarPerfil.php">Modificar mis datos</a></li>
                
                <?php
                    if($_SESSION['rol'] == 'administrador'){
                        echo "<li><a href='index.php?controller=usuarioController&action=listadoUsuarios'>Listado de usuarios</a></li>";
                    }
                    if($_SESSION['rol'] == 'bibliotecario' || $_SESSION['rol'] == 'administrador'){
                        echo "<li><a href='index.php?controller=libroController&action=insertarLibro'>Insertar libro</a></li>";
                        echo "<li><a href='index.php?controller=autorController&action=insertarAutor'>Insertar autor</a></li>";
                    }
                ?>


            </ul>
        </nav>
        

