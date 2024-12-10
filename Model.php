<?php
    class Model{
        protected $table;
        protected $db;

        public function __construct($table){
            $this->db = new Db();
            $this->$table = $table;
            $this->db->crearConexion();
        }

        function getAll(){
            $lista = $this->db->consultaSelect("SELECT * FROM $this->table");
            $this->db->cerrarConexion();
            return $lista;
        }
    }
?>