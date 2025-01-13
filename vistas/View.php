<?php
    class View{
        public static function show($viewName){
            include ("vistas/header.php");
            include("$viewName.php");
            include ("vistas/footer.php");
        }
    }
?>