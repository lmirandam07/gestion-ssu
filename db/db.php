<?php

class Db {
    //
    public static function conexion() {
        // Atributos para conectar a la base de datos
        $servername = "us-cdbr-east-02.cleardb.com";
        $username = "b2586d3340223e";
        $password = "1ab5dbbb";
        $dbname = "heroku_c4384219465490e";

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