<?php
    require_once 'modelos/Usuario.php';
    require_once 'controladores/Seguridad.php';
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
            
            
            
            // if(isset($_POST['registrar'])){
            //     require_once 'modelos/Usuario.php';
            //     $usuario = new Usuario();
            //     $nombre = $_POST['nombre'];
            //     $apellidos = $_POST['apellidos'];
            //     $login = $_POST['usuario'];
            //     $password = $_POST['password'];
            //     if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == UPLOAD_ERR_OK){    
            //         $ruta = $_FILES["avatar"]["tmp_name"];
            //         $tipo = $_FILES["avatar"]["type"];
            //         $tam = $_FILES["avatar"]["size"];
            //         $destino = "imagenes/".$login;
            //         $avatar = $destino;
            //         if(move_uploaded_file($ruta, $avatar) && $tam < 1000000){    
            //             $salt = random_int(10000000,99999999);
            //             $rol = 'registrado';
            //             $password = password_hash($password.$salt, PASSWORD_DEFAULT);
            //             $usuario->insert($nombre, $apellidos, $login, $password, $salt, $avatar, $rol);
            //             header('Location: index.php?data=Usuario registrado correctamente');
            //         }else{
            //             header('Location: index.php?data=Error al subir el archivo');
            //         }
            //     }
            // }
            
            View::show("showRegistro");
        
        }
    }
?>