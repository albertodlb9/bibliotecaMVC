<?php
require_once 'Model.php';
    class Autor extends Model{
        public function __construct(){
            parent::__construct('autores');
        }
      
        public function insertar($nombre, $apellidos, $nacionalidad){
            $sql = "INSERT INTO $this->table (Nombre, Apellidos, Pais) VALUES (?, ?, ?)";
            $stmt = $this->db->db->prepare($sql);
            $stmt->bind_param("sss", $nombre, $apellidos, $nacionalidad);
            $stmt->execute();
            return $stmt->insert_id;
        }

        public function update($id, ...$values){
            // Definir las columnas de la tabla
            $columns = ['Nombre', 'Apellidos', 'Pais']; 
        
            // Generar la cláusula SET de forma dinámica
            $set_clause = implode(' = ?, ', $columns) . ' = ?';
            
            // Crear la sentencia SQL
            $sql = "UPDATE $this->table SET $set_clause WHERE id = ?"; // Utilizamos 'id' como clave primaria
        
            // Preparar la consulta
            $stmt = $this->db->db->prepare($sql); // Corregido el acceso a la conexión
        
            // Definir los tipos de parámetros (todos strings 's') para las columnas, más 'i' para el id
            $types = str_repeat('s', count($values)) . 'i'; // 's' para cada valor de columna, 'i' para el id (asumido como entero)
        
            // Bind de los parámetros
            $stmt->bind_param($types, ...array_merge($values, [$id]));
        
            // Ejecutar y devolver el número de filas afectadas
            $stmt->execute();
            return $stmt->affected_rows;
        }

        public function get($id){
            $sql = "SELECT * FROM $this->table WHERE  idAutor = ?";
            $stmt = $this->db->db->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    }
?>