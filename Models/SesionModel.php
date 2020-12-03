<?php

    require_once $_SERVER['/var/www/html'] .'db/db.php';

    class SesionModel {
        private $db;

        public function __construct()
        {
            $this->db = db::conexion();
        }

        public function inicio_sesion($datos) {

        }
    }