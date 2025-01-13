
<?php
require_once 'Model.php';
    class Usuario extends Model{
        public function __construct(){
            parent::__construct('usuarios');
        }
      
    }
?>