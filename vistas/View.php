<?php
    class View{
        public static function show($viewName,$data=null){
            if ($data !== null && is_array($data)) {
                extract($data);
            }
            include ("vistas/header.php");
            include("$viewName.php");
            include ("vistas/footer.php");
        }
    }
?>