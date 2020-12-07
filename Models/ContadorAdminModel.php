<?php 

    require_once $_SERVER['/var/www/html'].'../../db/db.php';

    //Clase de ContadorAdminModel ewn la cual se definen algunas variables
    class ContadorAdminModel{
        private $db;
        private $contador_proyecto=0;
        private $contador_propuesta=0;

        //Se crea la conexion con la BD
        public function __construct()
        {
            $this->db = db::conexion();
        }
        //Funcion contadorPropuesta encargada de contar la cantidad de propuestas pendientes en el sistema
        public function contadorPropuesta(){
            //Se seleccionan todas las propuestas con el id_estado=3 que equivale a las propuestas pendientes

            try {
                $sql_propuesta="SELECT COUNT(*) AS total
                FROM propuesta_proyecto
                WHERE id_estado = 3";
                $contador_propuesta=$this->db->query($sql_propuesta);
    
            } catch(Exception $e) {
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }

            while($row = mysqli_fetch_assoc($contador_propuesta))[
                $total_propuesta=$row['total']
            ];
            $this->db->close();
            //Se regresa el total_propuesta
            return $total_propuesta;
        }
        //Funcion contadorProyecto encargada de contar la cantidad de proyectos registrados en el sistema
        public function contadorProyecto(){
            //Se cuentan la cantidad de filas que hay que tabla proyectos

            try {
                $sql_proyecto="SELECT COUNT(*) AS total
                        FROM proyecto ";
                $contador_proyecto=$this->db->query($sql_proyecto);
    
            } catch(Exception $e) {
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }

            while($row = mysqli_fetch_assoc($contador_proyecto))[
                $total_proyecto=$row['total']
            ];
            $this->db->close();
            //se regresa total_proyecto
            return $total_proyecto;
        }

    }
?>