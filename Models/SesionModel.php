<?php

require_once $_SERVER['/var/www/html'] . 'db/db.php';

class SesionModel
{
    private $db;

    public function __construct()
    {
        $this->db = db::conexion();
    }

    public function inicio_sesion($correo, $contrasena)
    {
        try {
            $sql = "SELECT id_tipo_us,nombre_us FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasena' ";
            $result = $this->db->query($sql);

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        if(mysqli_num_rows($result) == 0) {
            return False;
        }

        $result =  $result->fetch_assoc();

        $this->db->close();
        return $result;
    }
}
