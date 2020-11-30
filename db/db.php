<?php

class Db {
    public static function conexion() {
        $conexion = new mysqli("mysql", "root", "ssu12345", "ssu_db");

        return $conexion;
    }
}