<?php 
session_start();

require_once $_SERVER['/var/www/html'] .'db/db.php';
    //se crea la clase modelo y se definen sus variables
class UsuarioModel{
    private $db;
    private $registros;
    private $horas;
    private $proyectos;

    

    public function __construct()
    {
    //se establece la conexion con la base de datos y se crean arreglos
        $this->db = db::conexion();
        $this->registros = array(); 
        $this->horas = array();
        $this->proyectos = array();
    }

    //funcion para registrar un usuario en la base de datos
    public function registrarUsuarios($datos){
        //se almacenan los datos que nos brinda el formulario
        $nombre=$datos['nombre_us'];
        $apellido=$datos['apellido_us'];
        $cedula=$datos['cedula_us'];
        $numero_contacto=$datos['telefono'];
        $correo=$datos['correo'];
        $contra=$datos['contrasena'];
        $facultad=$datos['facultad'];
        $validarC=$datos['validC'];
        //en tal caso de que las contraseñas no sean iguales no se puede seguir con el registro
         if ($contra!=$validarC){
            $this->registro_exitoso = False;
            echo '<script>console.log("No Exitoso")</script>';
        }
        else{
            //se hace un query para insertar los datos en la base de datos
        $sql="INSERT INTO usuario (nombre_us, apellido_us, cedula_us, id_tipo_us, telefono, correo, contrasena, total_horas,facultad) 
        VALUES ('$nombre', '$apellido', '$cedula', 1, '$numero_contacto', '$correo', '$contra', 0, '$facultad')";
            //condicional que, dependiendo de que si se realiza el query, muestra una pantalla de exito o de intento fallido
        if($this->db->query($sql) == True){
            $this->registro_exitoso = True;
            echo '<script>console.log("Exitoso")</script>';
        }
        else{
            $this->registro_exitoso = False;
            echo '<script>console.log("No Exitoso")</script>';
        }
        }
        


    }
    //una funcion que nos permite obtener los datos del perfil del usuario, como su nombre, apellido, cedula
    public function obtenerPerfil($correo){
        $consulta=$this->db->query("SELECT us.nombre_us, us.apellido_us, us.cedula_us, fa.nombre_facultad, us.correo, us.telefono
        FROM usuario us
        INNER JOIN facultad fa ON us.facultad=fa.id_facultad
        WHERE '$correo'=us.correo;");
    //Se hace un recorrido while para guardar los datos en el arreglo registros y luego retornar estos valores.
        while($filas=$consulta->fetch_assoc()){
            $registros[]=$filas;
        }
        return $registros;
    }
    
    //funcion para saber si el estudiante se ha inscrito en algun proyecto.
    public function totalProyectos($correo){
        $n=0;    
        $consulta=$this->db->query("SELECT pro.nombre_pro, pro.descripcion_pro
        FROM proyecto pro
        INNER JOIN proyecto_usuario p ON p.id_proyecto=pro.id_proyecto
        INNER JOIN usuario u ON '$correo'=u.correo
        WHERE pro.id_proyecto = p.id_proyecto AND u.id_usuario = p.id_usuario;");
    //en caso tal de que no se encuentren proyectos retorna un falso.
        if (mysqli_num_rows($consulta) == 0){
            return false;
        }
        return $consulta->fetch_assoc();

        
   }

    //funcion para obtener las horas individuales por proyecto de un usuario.
    public function obtenerHoras($correo){
    $consulta=$this->db->query("SELECT pro.nombre_pro, pro.fecha_pro, pro.hora_inicio_pro, pro.hora_final_pro, u.total_horas, p.horas_usuario
    FROM proyecto pro
    INNER JOIN proyecto_usuario p ON p.id_proyecto=pro.id_proyecto
    INNER JOIN usuario u ON '$correo'=u.correo
    WHERE pro.id_proyecto = p.id_proyecto AND u.id_usuario = p.id_usuario;");
    //Se hace un recorrido while para guardar los datos en el arreglo horas y luego retornar estos valores.
            while($filas=$consulta->fetch_assoc()){
                $horas[]=$filas;
            }
            return $horas;

    }
    //funcion para obtener todos los proyectos en donde se ha inscrito el usuario.
    public function obtenerProyectosUsuario($correo){
        $consulta=$this->db->query("SELECT pro.nombre_pro, pro.descripcion_pro
        FROM proyecto pro
        INNER JOIN proyecto_usuario p ON p.id_proyecto=pro.id_proyecto
        INNER JOIN usuario u ON '$correo'=u.correo
        WHERE pro.id_proyecto = p.id_proyecto AND u.id_usuario = p.id_usuario;");
        $n=0;
     //Se hace un recorrido while para guardar los datos en el arreglo proyectos y luego retornar estos valores.
        while($filas=$consulta->fetch_assoc()){
            $proyectos[]=$filas;
            $n++;
        }

        return $proyectos;


    }

    
    //funcion para inscribir al usuario en un proyecto
    public function inscribirse($correo,$id_proyecto){
    //se hace un query conseguir el id de usuario y el id de proyecto
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
    //se hace un query para insertar los datos que hemos conseguido en la tabla de proyecto_usuario, finalizando la inscripcion del usuario en un proyecto
        $this->db->query("INSERT INTO proyecto_usuario(id_proyecto,id_usuario,horas_usuario) VALUES('$id_proyecto','$id_usuario','$horas');");
    }

    
    
}



?>