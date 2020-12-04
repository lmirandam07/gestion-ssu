<?php 


    require_once $_SERVER['/var/www/html'].'../../db/db.php';

    class ContadorAdminModel{
        private $db;
        private $contador_proyecto=0;
        private $contador_propuesta=0;

        public function __construct()
        {
            $this->db = db::conexion();
        }

        public function contadorPropuesta(){
            $sql_propuesta="SELECT COUNT(*) AS total
                        FROM propuesta_proyecto";
            $contador_propuesta=$this->db->query($sql_propuesta);
            while($row = mysqli_fetch_assoc($contador_propuesta))[
                $total_propuesta=$row['total']
            ];
            //$contador_propuesta =  $contador_propuesta->fetch_assoc();
            /*if(mysqli_num_rows($contador_propuesta) == 0) {
                return False;
            }*/
    
            //$contador_propuesta =  $contador_propuesta->fetch_assoc();
    
            $this->db->close();
            return $total_propuesta;
            
        }

        public function contadorProyecto(){
            $sql_proyecto="SELECT COUNT(*) AS total
                        FROM proyecto ";
            $contador_proyecto=$this->db->query($sql_proyecto);
            while($row = mysqli_fetch_assoc($contador_proyecto))[
                $total_proyecto=$row['total']
            ];

            $this->db->close();
            return $total_proyecto;
        }

    }
?>