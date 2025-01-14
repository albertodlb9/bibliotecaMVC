
<?php
require_once 'Model.php';
    class Usuario extends Model{
        public function __construct(){
            parent::__construct('usuarios');
        }

        public function update($id, ...$values){
            $columns = ['nombre', 'apellidos', 'login', 'password', 'salt', 'avatar', 'rol']; 
        
            // Generar la cláusula SET de forma dinámica
            $set_clause = implode(' = ?, ', $columns) . ' = ?';
        
            // Crear la sentencia SQL
            $sql = "UPDATE $this->table SET $set_clause WHERE login = ?";
        
            // Preparar la consulta
            $stmt = $this->db->db->prepare($sql); // Corregido el acceso a la conexión
        
            // Definir los tipos de parámetros (todos strings 's')
            $types = str_repeat('s', count($values) + 1); // +1 para el $id (también string)
        
            // Bind de los parámetros
            $stmt->bind_param($types, ...array_merge($values, [$id]));
        
            // Ejecutar y devolver el número de filas afectadas
            $stmt->execute();
            return $stmt->affected_rows;
    }

    public function insert(...$values){
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        $sql = "INSERT INTO $this->table VALUES ($placeholders)";
        $stmt = $this->db->db->prepare($sql);
        $types = str_repeat('s', count($values));
        $stmt->bind_param($types, ...$values);
        $stmt->execute();
        return $stmt->affected_rows;
    }
      
    }
?>