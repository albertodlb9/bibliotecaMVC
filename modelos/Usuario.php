
<?php
require_once 'Model.php';
    class Usuario extends Model{
        public function __construct(){
            parent::__construct('usuarios');
        }
        function getUsuario($usuario){
            $lista = $this->db->consultaSelect("SELECT * FROM $this->table WHERE usuario = :usuario;");
            $this->db->cerrarConexion();
            return $lista;
        }
        function login($usuario, $password){
            $lista = $this->db->consultaSelect("SELECT * FROM $this->table WHERE usuario = :usuario;");
            if(password_verify($password.$lista[0]['salt'], $lista[0]['password'])){
                return $lista;
            }else{
                return false;
            }
            $this->db->cerrarConexion();
        }
        
    }
?>