<?php
require_once 'config.php';
    class Db{
        private $db;

        function crearConexion(){
            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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