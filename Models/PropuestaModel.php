<?php
    require_once $_SERVER['/var/www/html'] .'db/db.php';
    Class PropuestaModel{
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
            $fecha_pro = str_replace('/','-',$fecha_pro);
            $fecha = new DateTime($fecha_pro);
            $fecha = $fecha->format('Ymd');
            $hora_inicio_pro = $datos['hora_inicio_pro'];
            $hora_inicio = new DateTime($hora_inicio_pro);
            $hora_inicio = $hora_inicio->format('H:i'); 
            $hora_final_pro = $datos['hora_final_pro'];
            $hora_final = new DateTime($hora_final_pro);
            $hora_final = $hora_final->format('H:i');
            $participantes_pro = (int)$datos['participantes_pro'];
            $descrip_pro = $datos['describ_pro'];
            $objetivo_pro = $datos['objetivo_pro'];
            $materiales_pro = $datos['materiales_pro'];

            $nombre_encarg = $datos['nombre_encarg'];
            
            $cedula_encarg = $datos['cedula_encarg'];
            $telefono_encarg = (int)$datos['telefono_encarg'];
            $correo_encarg = $datos['correo'];
            $perfil_estu_pro = $datos['perfil_estu_pro'];
            $sql = "INSERT INTO propuesta_proyecto(nombre_pro,lugar_pro,fecha_pro,hora_inicio_pro,hora_final_pro,participantes_pro,descripcion_pro,objetivo_pro,materiales_pro,nombre_encarg,cedula_encarg,telefono_encarg,correo_encarg,perfil_estu_pro) 
                    VALUES('$nombre_pro','$lugar_pro','$fecha','$hora_inicio','$hora_final','$participantes_pro','$descrip_pro','$objetivo_pro','$materiales_pro','$nombre_encarg','$cedula_encarg','$telefono_encarg','$correo_encarg','$perfil_estu_pro');";
            if($this->db->query($sql) == True){
                echo 'Exitoso';
            }
            else{
                echo 'No Exitoso';
            }
        }

        public function obtener_propuestas($page){
            $num_per_page = 04;
            $start_from = (1-intval($page))*$num_per_page;
            $consulta = $this->db->query("select nombre_pro, descripcion_pro from propuesta_proyecto where id_estado = '3' limit $start_from,$num_per_page ;");
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
            $total = mysqli_num_rows($propuestas);
            return $total;
        }

        public function total_paginas(){
            $num_per_page = 04;
            $totalrecord = $this->total_propuestas();
            $totalpages = ceil($totalrecord/$num_per_page);
            
            return $totalpages;
        }
        
    }

?>