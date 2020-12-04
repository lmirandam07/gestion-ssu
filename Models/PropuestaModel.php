<?php
    require_once $_SERVER['/var/www/html'] .'db/db.php';
    Class PropuestaModel{
        private $db;
        private $propuestas;
        private $acceso_propuesta;
        public $registro_exitoso;
        

        public function __construct(){
            $this->db = Db::conexion();
            $this->propuestas = array();
            $this->acceso_propuesta = array();
            $this->registro_exitoso = False;
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
                $this->registro_exitoso = True;
                echo '<script>console.log("Exitoso")</script>';
            }
            else{
                $this->registro_exitoso = False;
                echo '<script>console.log("No Exitoso")</script>';
            }
        }
        public function insertar_facultad_anio_propuesta($facultades,$anios){
            $id_propuesta = (int)mysqli_insert_id($this->db);
            foreach((array)$facultades as $facultad){
                $facultad = (int)$facultad;
            }
            foreach((array)$anios as $anio){
                $anio = (int)$anio;
            }
            foreach((array)$facultades as $facultad){
                $this->db->query("INSERT INTO facultad_propuesta(id_propuesta,id_facultad)VALUES('$id_propuesta','$facultad');");

            }
            foreach((array)$anios as $anio){
                $this->db->query("INSERT INTO ano_proyecto(id_propuesta,id_ano)VALUES('$id_propuesta','$anio');");

            }
        }

        public function obtener_propuestas($page){
            $num_per_page = 04;
            $start_from = (intval($page)-1)*$num_per_page;
            $consulta = $this->db->query("select id_propuesta, nombre_pro, descripcion_pro from propuesta_proyecto where id_estado = '3' limit $start_from,$num_per_page;");
            while($filas = $consulta->fetch_assoc()){
                $propuestas[] = $filas;
            }
            return $propuestas;
        }

        public function total_propuestas(){
            $consulta = $this->db->query("select * from propuesta_proyecto where id_estado = '3';");
            $i = 0;
            while($filas = $consulta->fetch_assoc()){
                $propuestas[] = $filas;
                $i++;
            }
            $total = $i;
            return $total;
        }

        public function total_paginas(){
            $num_per_page = 04;
            $totalrecord = $this->total_propuestas();
            $totalpages = ceil($totalrecord/$num_per_page);
            
            return $totalpages;
        }

        public function acceder_propuesta($id_propuesta){
            $consulta= $this->db->query("select * from propuesta_proyecto where id_propuesta ='$id_propuesta';");
            while($filas= $consulta->fetch_assoc()){
                $acceso_propuesta[] = $filas; 

            }
            return $acceso_propuesta;


        }
        public function acceder_anios_propuesta($id_propuesta){
            $consulta = $this->db->query("select id_ano from ano_proyecto where id_propuesta ='$id_propuesta'");
            while($filas= $consulta->fetch_assoc()){
                $acceso_propuesta[] = $filas; 

            }
            return $acceso_propuesta;
        }
        public function acceder_facultades_propuesta($id_propuesta){
            $consulta = $this->db->query("select id_facultad from facultad_propuesta where id_propuesta ='$id_propuesta'");
            while($filas= $consulta->fetch_assoc()){
                $acceso_propuesta[] = $filas; 

            }
            return $acceso_propuesta;
        }
        public function aprobar_propuesta($id_propuesta){
            $sql = "UPDATE propuesta_proyecto SET id_estado = '1' WHERE id_propuesta = '$id_propuesta';";


        }
        
    }

?>