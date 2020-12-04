<?php session_start();


    require_once $_SERVER['/var/www/html'].'../../db/db.php';

    class ContadorEstuModel{
        private $db;
        private $contador_horas=0;
        private $contador_proyectoI=0;
        private $usuario;

        public function __construct()
        {
            $this->db = db::conexion();
        }

        public function contadorHoras(){
            $correo = $_SESSION['usuario_actual'];
            $sql_horas="SELECT total_horas AS total
                        FROM usuario
                        WHERE correo = '$correo';";
            $contador_horas=$this->db->query($sql_horas);
            while($row = mysqli_fetch_assoc($contador_horas))[
                $total_horas=$row['total']
            ];
            

            $this->db->close();
            return $total_horas;
            
        }

        public function contadorProyectoI(){
            $correo = $_SESSION['usuario_actual'];
            $sql_usuario="SELECT id_usuario AS id_us
                        FROM usuario
                        WHERE correo = '$correo';";
            $usuario=$this->db->query($sql_usuario);
            while($row = mysqli_fetch_assoc($usuario))[
                 $id_usuario =$row['id_us']
            ];
            
            $sql_proyectoI="SELECT COUNT(*) AS total
                        FROM proyecto_usuario
                        WHERE id_usuario = '$id_usuario'";
            $contador_proyectoI=$this->db->query($sql_proyectoI);
            while($row = mysqli_fetch_assoc($contador_proyectoI))[
                $total_proyectoI=$row['total']
            ];

            $this->db->close();
            return $total_proyectoI;
        }

    }
?>