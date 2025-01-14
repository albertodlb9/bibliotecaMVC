<?php
    require_once 'modelos/Autor.php';
    class autorController{
        public function listarAutores(){
            $autor = new Autor();
            $autores = $autor -> getAll();   
            View::show("listarAutores", $autores);
        }

        public function insertarAutor(){
            if(isset($_POST['Insertar'])){
                $autores = new Autor();
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $nacionalidad = $_POST['nacionalidad'];
                $autores->insertar($nombre, $apellidos, $nacionalidad);
                header('Location: index.php?controller=autorController&action=listarAutores');
            }
            View::show("insertarAutor");
        }
    }
?>