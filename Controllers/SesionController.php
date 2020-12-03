<?php
require_once $_SERVER['/var/www/html'].'Models/SesionModel.php';

    class SesionController {

        public function __construct()
        {

        }

        public function inicio_sesion($datos) {
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(isset($_SESSION['usuario_actual'])) {
                $this->redirigir();

            } else {
                $correo = $datos['correo'];
                $contrasena = $datos['contrasena'];

                $sesion_model = new SesionModel();
                $sesion_actual = $sesion_model->inicio_sesion($correo, $contrasena);

                if ($sesion_actual) {
                    $_SESSION['usuario_actual'] = $correo;
                    $_SESSION['tipo_usuario'] = $sesion_actual;

                    $this->redirigir();
                } else {
                    $this->redirigir();
                }
            }
        }

        public function redirigir() {
            try {
                if($_SESSION['tipo_usuario'] == 1) {
                    header('Location: Views/Estudiante/index.php');
                    die();
                } else if ($_SESSION['tipo_usuario'] == 2) {
                    header('Location: Views/Administrador/index.php');
                    die();
                } else {
                    header('Location: Views/General/inicio_sesion_error.php');
                    die();
                }
            } catch (Exception $e) {
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
        }
    }