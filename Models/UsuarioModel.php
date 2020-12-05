<?php 

session_start();

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
    $consulta=$this->db->query("SELECT pro.nombre_pro, pro.fecha_pro, pro.hora_inicio_pro, pro.hora_final_pro
            FROM proyecto pro
            INNER JOIN proyecto_usuario p
            INNER JOIN usuario u
            WHERE pro.id_proyecto = p.id_proyecto AND p.id_usuario=u.id_usuario ");

    }


    public function inscribirse($correo,$id_proyecto){
        $consulta = $this->db->query("SELECT id_usuario FROM usuario WHERE correo = '$correo';");
        $consulta_horas = $this->db->query("SELECT FORMAT(TIME_TO_SEC(TIMEDIFF(hora_final_pro, hora_inicio_pro)) / 3600,0) AS diferencia FROM proyecto WHERE id_proyecto = '$id_proyecto'");
        if(mysqli_num_rows($consulta)==0){
            return 'Error';

        }
        if(mysqli_num_rows($consulta_horas)==0){
            return 'Error';

        }
        $id_usuario = $consulta->fetch_assoc()['id_usuario'];
        $horas = $consulta_horas->fetch_assoc()['diferencia'];

        $this->db->query("INSERT INTO proyecto_usuario(id_proyecto,id_usuario,horas_usuario) VALUES('$id_proyecto','$id_usuario','$horas');");
    }

    
    
}



?>