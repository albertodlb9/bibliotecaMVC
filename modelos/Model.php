<?php
require_once 'controladores/db.php';
    class Model{
        
        protected $table;
        protected $db;

        public function __construct($table){
            $this->db = new Db();
            $this->$table = $table;
            $this->db->crearConexion();
        }

        public function getAll(){
            $lista = $this->db->consultaSelect("SELECT * FROM $this->table");
            $this->db->cerrarConexion();
            return $lista;
        }

        public function get($id){
            $record = $this->db->consultaSelect("SELECT * FROM $this->table WHERE id = $id");
            return $record;
        }

        public function delete($id){
            $borrar = $this->db->manipulacionDatos("DELETE FROM $this->table WHERE id = $id");
            return $borrar;
        }

        public function insert(...$values){
            $sql = "INSERT INTO $this->table VALUES(";
            $maximo = count($values);
            $contador = 1;
            foreach($values as $value){
                if($contador == $maximo){
                    $sql .= "'$value');";
                }else{
                    $sql .= "'$value', ";
                }
                $contador++;
            }
            $insertar = $this->db->manipulacionDatos($sql);
        }
        public function update($id, ...$values){
            $sql = "UPDATE $this->table SET ";
            $maximo = count($values);
            $contador = 1;
            foreach($values as $value){
                if($contador == $maximo){
                    $sql .= "$value WHERE id = $id;";
                }else{
                    $sql .= "$value, ";
                }
                $contador++;
            }
            
        }
    }
?>