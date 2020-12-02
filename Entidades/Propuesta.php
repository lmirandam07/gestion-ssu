<?php

    Class Propuesta{
        private $db;
        private $propuestas;

        public function __construct(){
            $this->db = Db::conexion();
            $this->propuestas = array();
        }
        
        public function insertar_propuesta($datos){
            $nombre_pro = $datos['nombre_pro'];
            $lugar_pro = $datos['lugar_pro'];
            $fecha_pro = $datos['fecha_pro'];
            $hora_inicio_pro = $datos['hora_inicio_pro'];
            $hora_final_pro = $datos['hora_final_pro'];
            $participantes_pro = $datos['participantes_pro'];
            $descrip_pro = $datos['describ_pro'];
            $objetivo_pro = $datos['objetivo_pro'];
            $materiales_pro = $datos['datos_pro'];
            $nombre_encarg = $datos['nombre_encarg'];
            $cedula_encarg = $datos['cedula_encarg'];
            $telefono_encarg = $datos['telefono_pro'];
            $correo_encarg = $datos['correo'];
            $perfil_estu_pro = $datos['perfil_estu_pro'];

            $sql = "INSERT INTO propuesta_proyecto(nombre_pro,lugar_pro,fecha_pro,hora_inicio_pro,hora_final_pro,participantes_pro,descripcion_pro,objetivo_pro,materiales_pro,nombre_encarg,cedula_encarg,telefono_encarg,correo_encarg,perfil_estu_pro) 
                                VALUES($nombre_pro,$lugar_pro,$fecha_pro,$hora_inicio_pro,$hora_final_pro,$participantes_pro,$descrip_pro,$objetivo_pro,$materiales_pro,$nombre_encarg,$cedula_encarg,$telefono_encarg,$correo_encarg,$perfil_estu_pro)";
            $this->db->query($sql);
        }

        public function obtener_propuestas(){
            require_once('./ver_propuestas.php');
            $consulta = $this->db->query("select nombre_pro, descripcion_pro from propuesta_proyecto where id_estado = '3' limit $start_from, $num_per_page;");
            while($filas = $consulta->fetch_assoc()){
                $propuestas[] = $filas;
            }
            return $propuestas;
        }

        public function total_propuestas(){
            $consulta = $this->db->query("select * from propuesta_proyecto where id_estado = '3';");
            while($filas = $consulta->fetch_assoc()){
                $propuestas[] = $filas;
            }
            $total = mysqli_num_rows($propuestas[]);
            return $total;
        }
        
    }

?>