<?php
    class View{
        public function show($viewName, $data = null){
            include ("header.php");
            include("$viewName.php?datos=$data");
            include ("footer.php");
        }
    }
?>