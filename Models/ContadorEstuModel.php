<?php session_start();

    require_once $_SERVER['/var/www/html'].'../../db/db.php';
    //Crea clase ContadorEstuModel y define varibles tipo public
    class ContadorEstuModel{
        private $db;
        private $contador_horas=0;
        private $contador_proyectoI=0;
        private $usuario;
    //Conexion a la base de datos
    public function __construct()
    {
        $this->db = db::conexion();
    }
    //Funcion que se encarga de determinar las horas de servicio social que lleva un estudiante
        public function contadorHoras(){
            //Se crea una variable para almacenar el correo de la sesion actual y se busca dicho correo en la BD
            //Luego se busca la cantidad de horas que lleva dicho usuario
            $correo = $_SESSION['usuario_actual'];
            $sql_horas="SELECT total_horas AS total
                        FROM usuario
                        WHERE correo = '$correo';";
            $contador_horas=$this->db->query($sql_horas);
            while($row = mysqli_fetch_assoc($contador_horas))[
                $total_horas=$row['total']
            ];
            $this->db->close();
            //Se retorna la variable total horas
            return $total_horas;
            
        }
    //Funcion que determina la cantidad de proyectos en los cuales se encuentra inscrito el estudiante
    public function contadorProyectoI(){
        //Se crea una variable en la cual se guarda el correo del usuario actual
        //Posteriormente se selecciona el id_usuario que sea igual al correo dentro de la variable
        $correo = $_SESSION['usuario_actual'];

        try {
            $sql_usuario="SELECT id_usuario AS id_us
                    FROM usuario
                    WHERE correo = '$correo';";
            $usuario=$this->db->query($sql_usuario);

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        while($row = mysqli_fetch_assoc($usuario))[
                $id_usuario =$row['id_us']
            ];
        //Se cuentan la cantidad de filas de proyectos inscritos en las cuales se encuentra el id_usuairo recopilado anteriormente

        try {
            $sql_proyectoI="SELECT COUNT(*) AS total
            FROM proyecto_usuario
            WHERE id_usuario = '$id_usuario'";
            $contador_proyectoI=$this->db->query($sql_proyectoI);

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }
        
        while($row = mysqli_fetch_assoc($contador_proyectoI))[
            $total_proyectoI=$row['total']
            ];
            $this->db->close();
            //Se regresan el total_proyectoI
            return $total_proyectoI;
        }

    }
?>