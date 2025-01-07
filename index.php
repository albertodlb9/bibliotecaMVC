<?php
require_once 'controladores/usuarioController.php';

if(!file_exists('config.php')){
    header('Location: install.php');
}

if (!isset($_REQUEST['action'])) {
    $action = "index";
  } else {
    $action = $_REQUEST['action'];
  }

  if (!isset($_REQUEST['controller'])) {
    $controllerClassName = "Controller";
  } else {
    $controllerClassName = $_REQUEST['controller'];
  }
  $controller = new $controllerClassName();
  $controller->$action();
?>