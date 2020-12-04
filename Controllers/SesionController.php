<?php
require_once $_SERVER['/var/www/html'].'Models/SesionModel.php';

    class SesionController {

        public function __construct()
        {

        }

        public function inicio_sesion($datos) {
            // En caso de no existir una sesión, esta se crea
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Si ya existe un usuario actual llamar a la función de redirigir
            if($_SESSION['usuario_actual']) {
                $this->redirigir();
            } else {
                $correo = $datos['correo'];
                $contrasena = $datos['contrasena'];

                // Se crea el modelo que hará las peticiones a la base de datos con los datos de inicio
                $sesion_model = new SesionModel();
                $sesion_actual = $sesion_model->inicio_sesion($correo, $contrasena);

                // Si los datos ingresados son válidos o no llamar a la función de redirigir
                if ($sesion_actual) {
                    $_SESSION['usuario_actual'] = $correo;
                    $_SESSION['tipo_usuario'] = $sesion_actual['id_tipo_us'];
                    $_SESSION['nombre_usuario'] = $sesion_actual['nombre_us'];
                    $this->redirigir();
                } else {
                    $this->redirigir();
                }
            }
        }

        public function redirigir() {
            try {
                // Si el ususario es de tipo 1 (estudiante) enviarlo a su index, igual para administrador
                if($_SESSION['tipo_usuario'] == 1) {
                    header('Location: Views/Estudiante/index.php');
                    die();
                } else if ($_SESSION['tipo_usuario'] == 2) {
                    header("Location: Views/Administrador/index.php");
                    die();
                } else {
                    // En caso de no existir el usuario enviar a una pantalla de error
                    header('Location: Views/General/iniciar_sesion_error.php');
                    die();
                }
            } catch (Exception $e) {
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
        }

        public function header_redirigir() {
            try {

                if($_SESSION['tipo_usuario'] == 1) {
                    include('./Views/Layouts/header_usuario.html');
                } else if ($_SESSION['tipo_usuario'] == 2) {
                    include('./Views/Layouts/header_usuario_admin.html');
                } else {
                    include('./Views/Layouts/header.html');
                }
            } catch (Exception $e) {
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
        }

        public function cerrar_sesion() {
            // Se destruye la sesión actual del usuario
            session_start();
            session_destroy();
            header('Location: index.php');
            die();
        }
    }