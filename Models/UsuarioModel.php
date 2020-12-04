<?php 

session_start();

require_once $_SERVER['/var/www/html'] .'db/db.php';

class UsuarioModel{
    private $db;
    private $registros;
    private $horas;
    private $proyectos;

    

    public function __construct()
    {
        $this->db = db::conexion();
        $this->registros = array(); 
        $this->horas = array();
        $this->proyectos = array();
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
        if($this->db->query($sql) == True){
            $this->registro_exitoso = True;
            echo '<script>console.log("Exitoso")</script>';
        }
        else{
            $this->registro_exitoso = False;
            echo '<script>console.log("No Exitoso")</script>';
        }


    }

    public function obtenerPerfil($correo){
        $consulta=$this->db->query("SELECT us.nombre_us, us.apellido_us, us.cedula_us, fa.nombre_facultad, us.correo, us.telefono
        FROM usuario us
        INNER JOIN facultad fa ON us.facultad=fa.id_facultad
        WHERE '$correo'=us.correo;");
        while($filas=$consulta->fetch_assoc()){
            $registros[]=$filas;
        }
        return $registros;
    }
    



    public function obtenerHoras($correo){
    $consulta=$this->db->query("SELECT pro.nombre_pro, pro.fecha_pro, pro.hora_inicio_pro, pro.hora_final_pro, u.total_horas, p.horas_usuario
    FROM proyecto pro
    INNER JOIN proyecto_usuario p ON p.id_proyecto=pro.id_proyecto
    INNER JOIN usuario u ON '$correo'=u.correo
    WHERE pro.id_proyecto = p.id_proyecto AND u.id_usuario = p.id_usuario;");
            while($filas=$consulta->fetch_assoc()){
                $horas[]=$filas;
            }
            return $horas;

    }

    public function obtenerProyectosUsuario($correo){
        $consulta=$this->db->query("SELECT pro.nombre_pro, pro.descripcion_pro
        FROM proyecto pro
        INNER JOIN proyecto_usuario p ON p.id_proyecto=pro.id_proyecto
        INNER JOIN usuario u ON '$correo'=u.correo
        WHERE pro.id_proyecto = p.id_proyecto AND u.id_usuario = p.id_usuario;");
        $n=0;
        while($filas=$consulta->fetch_assoc()){
            $proyectos[]=$filas;
            $n++;
        }

        return $proyectos;


    }




    

}



?>