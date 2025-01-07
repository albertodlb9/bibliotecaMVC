<?php
require_once '../config.php';
    class Db{
        private $db;

        function crearConexion(){
            try{
                $this->db = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
                return 0;
            }catch(PDOException $e){
                return -1;
            }
        }

        function cerrarConexion(){
            if($this->db != null){
                $this->db = null;
            }
        }

        function consultaSelect($sql){
            $res = $this->db->query($sql);
            $resArray = array();
            if($res){
                $resArray = $res->fetchAll();
            }
            return $resArray;
        }

        function manipulacionDatos($sql){
            $this->db->query($sql);
            return $this->db->rowCount();
        }

    }
?>