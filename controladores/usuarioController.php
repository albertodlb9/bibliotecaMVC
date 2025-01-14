<?php
    require_once 'modelos/Usuario.php';
    require_once 'vistas/View.php';

    class usuarioController {
        
        public function login() {
            
            $usuario = new Usuario();
            $user = $_POST['usuario'];
            $password = $_POST['password'];
            $datos = $usuario -> get($user);
            if($datos){
                if(password_verify($password.$datos['salt'], $datos['password'])){
                    session_start();
                    $_SESSION['usuario'] = $datos['usuario'];
                    $_SESSION['rol'] = $datos['rol'];
                    $_SESSION['nombre'] = $datos['nombre'];
                    $_SESSION['apellidos'] = $datos['apellidos'];
                    $_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
                    header('Location: index.php');
                }else{
                    header('Location: index.php?err=Usuario o contraseña incorrectos');
                }
            }else{
                header('Location: index.php?err=Usuario o contraseña incorrectos');
            }
        }

        public function registro(){

            if(isset($_POST['registrar'])){
                require_once 'modelos/Usuario.php';
                $usuario = new Usuario();
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $login = $_POST['usuario'];
                $password = $_POST['password'];
                if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == UPLOAD_ERR_OK){    
                    $ruta = $_FILES["avatar"]["tmp_name"];
                    $tipo = $_FILES["avatar"]["type"];
                    $tam = $_FILES["avatar"]["size"];
                    $destino = "imagenes/".$login;
                    $avatar = $destino;
                    if(move_uploaded_file($ruta, $avatar) && $tam < 1000000){    
                        $salt = random_int(10000000,99999999);
                        $rol = 'registrado';
                        $password = password_hash($password.$salt, PASSWORD_DEFAULT);
                        $usuario->insert($nombre, $apellidos, $login, $password, $salt, $avatar, $rol);
                        header('Location: index.php?data=Usuario registrado correctamente');
                    }else{
                        header('Location: index.php?data=Error al subir el archivo');
                    }
                }
            }
            
            View::show("showRegistro");
        
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
            header('Location: index.php');
        }

        public function listadoUsuarios(){
            $usuario = new Usuario();
            $usuarios = $usuario->getAll();
            View::show("listadoUsuarios", $usuarios);
        }

        public function borrarUsuario($data){
            $usuario = new Usuario();
            $usuario->delete($data);
            header('Location: index.php?controller=usuarioController&action=listadoUsuarios');
        }

        public function modificarUsuario($data){
            $usuario = new Usuario();
            $datos = $usuario->get($data);
            $login = $datos['login'];
            $nombre = $datos['nombre'];
            $apellidos = $datos['apellidos'];
            $rol = $datos['rol'];
            $salt = $datos['salt'];
            $password = $datos['password'];

            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $nuevoLogin = $_POST['login'];
                $rol = $_POST['rol'];
                if($_POST['contraseña'] != ''){
                    $password = $_POST['contraseña'];
                    $contraseña = password_hash($password.$salt, PASSWORD_DEFAULT);
                }else{
                    $contraseña = $password;     
                }
                $usuario = new Usuario();
                $usuario->update($login, $nombre, $apellidos, $nuevoLogin, $contraseña, $salt, $rol);
                header('Location: index.php?controller=usuarioController&action=listadoUsuarios&msg=Usuario modificado correctamente'); 
            }
            View::show("modificarUsuario", $datos);
        }
}

?>