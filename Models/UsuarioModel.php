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
        $validarC=$datos['validC'];

        if ($contra!=$validarC){
            header("location:../Views/General/registrar.php");
        }
        else{
        $sql="INSERT INTO usuario (nombre_us, apellido_us, cedula_us, id_tipo_us, telefono, correo, contrasena, total_horas,facultad) 
        VALUES ('$nombre', '$apellido', '$cedula', 1, '$numero_contacto', '$correo', '$contra', 0, '$facultad')";
        $this->db->query($sql);

        }


    }

    public function obtenerPerfil(){
        $consulta=$this->db->query("SELECT us.nombre_us, us.apellido_us, us.cedula_us, fa.nombre_facultad, us.correo, us.telefono
        FROM usuario us
        INNER JOIN facultad fa ON us.facultad=fa.id_facultad;");
        while($filas=$consulta->fetch_assoc()){
            $registros[]=$filas;
        }
        return $registros;



    }





    

}



?>