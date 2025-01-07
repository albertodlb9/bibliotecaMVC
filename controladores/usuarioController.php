<?php
    require_once './modelos/Usuario.php';
    require_once './controladores/Seguridad.php';
    require_once './vistas/View.php';

    class usuarioController {
        public function index() {
            $seguridad = new Seguridad();
            if (!file_exists('config.php')) {
                header('Location: install.php');
            }

            if (isset($_POST['usuario'])) {
                $this->login();
            } else {
                require './vistas/login.php';
                View::show('login');
            }
        }

        private function login() {
            $usuario = new Usuario();
            $user = $_POST['usuario'];
            $password = $_POST['password'];
            $login = $usuario->login($user, $password);

            if ($login) {
                session_start();
                $_SESSION['usuario'] = $login['login'];
                $_SESSION['rol'] = $login['rol'];
                $_SESSION['nombre'] = $login['nombre'];
                $_SESSION['apellidos'] = $login['apellidos'];
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                $data['mensaje'] = "Inicio de sesión correcto";
                View::show('logeado');
            } else {
                $data['error'] = 'Usuario o contraseña incorrectos';
                View::show('login', $data);
            }
        }
    }
?>