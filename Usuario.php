<?php
    class Usuario extends Model{
        public function __construct(){
            parent::__construct('usuarios');
        }
        function getUsuario($usuario){
            $lista = $this->db->consultaSelect("SELECT * FROM $this->table WHERE usuario = :usuario;");
            $this->db->cerrarConexion();
            return $lista;
        }
    }
?>