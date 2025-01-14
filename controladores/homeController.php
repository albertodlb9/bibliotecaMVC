<?php
    class homeController{
        public function index(){
            $usuario = new Usuario("usuarios");
            if(isset($_POST['enviar'])){
                $user = $_POST['usuario'];
                $password = $_POST['password'];
                $datos = $usuario -> get($user);
                if($datos){
                    if(password_verify($password.$datos['salt'], $datos['password'])){
                        session_start();
                        $_SESSION['login'] = $datos['login'];
                        $_SESSION['rol'] = $datos['rol'];
                        $_SESSION['nombre'] = $datos['nombre'];
                        $_SESSION['apellidos'] = $datos['apellidos'];
                        $_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
                        header('Location: index.php?action=logeado');
                    }else{
                        header('Location: index.php?err=Usuario o contraseña incorrectos');
                    }
                }else{
                    header('Location: index.php?err=Usuario o contraseña incorrectos');
                }
            }
            require_once 'vistas/View.php';   
            View::show("showIndex"); 
        }

        public function logeado(){
            require_once 'vistas/View.php';   
            View::show("logeado");
        }
    }
?>