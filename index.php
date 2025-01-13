<?php
require_once 'controladores/homeController.php';
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
    $controllerClassName = "homeController";
  } else {
    $controllerClassName = $_REQUEST['controller'];
  }
  $controller = new $controllerClassName();

  if (!isset($_REQUEST['data'])) {
    $data = null;
  } else {
    $data = $_REQUEST['data'];
  }
  
  $controller->$action($data);
?>