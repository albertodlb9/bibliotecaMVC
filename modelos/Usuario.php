
<?php
require_once 'Model.php';
    class Usuario extends Model{
        public function __construct(){
            parent::__construct('usuarios');
        }

        public function update($id, ...$values){
            // Lista de columnas que quieres actualizar
            $columns = ['nombre', 'apellidos', 'login', 'password', 'salt', 'rol']; 
        
            // Comprobar si la cantidad de valores es igual a la cantidad de columnas
            if (count($columns) !== count($values)) {
                throw new Exception('La cantidad de valores no coincide con la cantidad de columnas');
            }
        
            // Generar la cláusula SET de forma dinámica
            $set_clause = '';
            foreach ($columns as $column) {
                $set_clause .= "$column = ?, ";
            }
            $set_clause = rtrim($set_clause, ', '); // Eliminar la coma extra al final
        
            // Crear la sentencia SQL
            $sql = "UPDATE $this->table SET $set_clause WHERE login = ?";
        
            // Preparar la consulta
            $stmt = $this->db->db->prepare($sql);
        
            // Definir los tipos de parámetros (todos strings 's', se pueden ajustar según el tipo de cada campo)
            // En este caso, asumimos que todos los campos son strings, puedes modificarlo si es necesario
            $types = str_repeat('s', count($values)) . 's'; // El último 's' es para el login (id)
        
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