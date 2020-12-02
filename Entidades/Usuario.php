<?php 




class Usuario{
    private $db;
    private $registro;

    

    public function contruct(){
        $this->db = db::conexion();
        $this->registro = array();
    }

    public function registrarUsuarios($parametro){
        $nombre=$parametro['nombre'];
        $apellido=$parametro['apellido'];
        $cedula=$parametro['cedula'];
        $numero_contacto=$parametro['numero_contaco'];
        $correo=$parametro['correo'];
        $contra=$parametro['contra'];
        $facultad=$parametro['facultad'];

        $sql="INSERT INTO usuario (nombre_us, apellido_us, cedula_us, id_tipo_us, telefono, correo, contrasena, facultad) 
        VALUES ('$nombre', '$apellido', '$cedula', '1', '$numero_contacto', '$correo', '$contra', '$facultad')";

        $this->db->query($sql);
    }





    

}



?>