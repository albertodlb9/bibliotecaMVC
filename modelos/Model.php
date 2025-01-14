<?php
require_once 'controladores/db.php';
class Model {
    protected $table;
    protected $db;

    public function __construct($table){
        $this->db = new Db();
        $this->table = $table; // Corregido
        $this->db->crearConexion();
    }

    public function getAll(){
        $sql = "SELECT * FROM $this->table";
        return $this->db->consultaSelect($sql);
    }

    public function get($id){
        $sql = "SELECT * FROM $this->table WHERE  login = ?";
        $stmt = $this->db->db->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE login = ?";
        $stmt = $this->db->db->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    } 
}
?>
