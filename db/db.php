<?php

class Db {

    public static function conexion() {
        $servername = "mysql";
        $username = "root";
        $password = "ssu12345";
        $dbname = "ssu_db";

        // Crear conexión
        $conexion = new mysqli($servername, $username, $password, $dbname);

        // Comprobar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        } else {
            return $conexion;
        }

    }
}   