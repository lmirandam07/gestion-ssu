<?php
require_once $_SERVER['/var/www/html'].'Models/SesionModel.php';

    class SesionController {
        public $session;

        public function __construct()
        {

        }

        public function inicio_sesion($datos) {
            $sesion_model = new SesionModel();
            $sesion_model->inicio_sesion($datos);
        }
    }