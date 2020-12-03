<?php 


require_once $_SERVER['/var/www/html'] .'db/db.php';

class UsuarioModel{
    private $db;
    private $registros;

    

    public function __construct()
    {
        $this->db = db::conexion();
        $this->registros = array(); 
    }


    public function registrarUsuarios($datos){
        $nombre=$datos['nombre_us'];
        $apellido=$datos['apellido_us'];
        $cedula=$datos['cedula_us'];
        $numero_contacto=$datos['telefono'];
        $correo=$datos['correo'];
        $contra=$datos['contrasena'];
        $facultad=$datos['facultad'];

        $sql="INSERT INTO usuario (nombre_us, apellido_us, cedula_us, id_tipo_us, telefono, correo, contrasena, total_horas,facultad) 
        VALUES ('$nombre', '$apellido', '$cedula', 1, '$numero_contacto', '$correo', '$contra', 0, '$facultad')";
        $this->db->query($sql);
    }





    

}



?>