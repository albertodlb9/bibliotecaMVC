<?php
require_once 'modelos/Libro.php';
require_once 'vistas/View.php';
require_once 'modelos/Autor.php';
    class libroController{
        public function listarLibros(){
            $libro = new Libro();
            $libros = $libro -> getAll();   
            View::show("listarLibros", $libros);
        }

        public function insertarLibro(){
            $libro = new Libro();
            $autores = new Autor();
            $autores = $autores -> getAll();
            if(isset($_POST['Insertar'])){
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $genero = $_POST['genero'];
                $npaginas = $_POST['nPaginas'];
                $nEjemplares = $_POST['nEjemplares'];
                $libro->insertar($titulo, $autor, $genero, $npaginas, $nEjemplares);
                header('Location: index.php?controller=libroController&action=listarLibros');
            }
            View::show("insertarLibro", $autores);
        }
    }
?>