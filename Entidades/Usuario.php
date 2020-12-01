<?php 




class Usuario{
    private $db;
    

    public function contruct(){
        $this->db = db::conexion();
    }

    public function registrarUsuarios($parametro){
        $nombre=$parametro['']

        $consulta = $this->db->query("INSERT INTO usuario (nombre_us, apellido_us, cedula_us, id_tipo_us, telefono, correo, contrasena, facultad) 
        VALUES ('$nombre', '$apellido', '$cedula', '1', '$numero_contacto', '$correo', '$contra', '$facultad');");
    }





    

}



?>