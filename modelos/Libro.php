<?php
require_once 'Model.php';
    class Libro extends Model{
        public function __construct(){
            parent::__construct('libros');
        }
      
        public function insertar($titulo, $autor, $genero, $npaginas, $nEjemplares){
            $sql = "INSERT INTO $this->table (titulo, idAutor, genero, numeroPaginas, numeroEjemplares) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->db->prepare($sql);
            $stmt->bind_param("sssss", $titulo, $autor, $genero, $npaginas, $nEjemplares);
            $stmt->execute();
        }
    }
?>