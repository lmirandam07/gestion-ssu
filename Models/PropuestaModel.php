<?php
    //Se incluye la clase y metodos de el arcivo de conexion a la base de datos
    require_once $_SERVER['/var/www/html'] .'db/db.php';
    //Clase donde se encuentran todos los metodos para realizar consultas a la base de datos
    Class PropuestaModel{
        private $db;
        private $propuestas;
        private $acceso_propuesta;
        public $registro_exitoso;
        private $nuevo_proyecto;
        

        public function __construct(){
            $this->db = Db::conexion();
            $this->propuestas = array();
            $this->acceso_propuesta = array();
            $this->registro_exitoso = False;
            $this->nuevo_proyecto = array();
        }
        //Metodo donde se realiza el query para insertar los datos en la tabla propuesta_proyecto
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
            try{
                $this->db->query($sql);
                $this->registro_exitoso = True;
            }
            catch(Exception $e){
                $this->registro_exitoso = False;
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
        }
        //Metodo donde se realiza el query para insertar los datos en la tabla facultad_propuesta y anio_proyecto
        public function insertar_facultad_anio_propuesta($facultades,$anios){
            //consulta que devuelve el id de un campo autoincrementado del ultimo INSERT realizado
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
        //Metodo para el query que retorna el nombre y descripcion de las propuestas para una vista previa
        public function obtener_propuestas($page){
            $num_per_page = 04;
            $start_from = (intval($page)-1)*$num_per_page;
            try{
                $consulta = $this->db->query("select id_propuesta, nombre_pro, descripcion_pro from propuesta_proyecto where id_estado = '3' limit $start_from,$num_per_page;");
            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
            while($filas = $consulta->fetch_assoc()){
                $propuestas[] = $filas;
            }
            return $propuestas;
        }
        //Metodo para calcular el total de propuestas que se encuentran para la paginacion de la vista previa
        public function total_propuestas(){
            try{
                $consulta = $this->db->query("select * from propuesta_proyecto where id_estado = '3';");
            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
            $i = 0;
            while($filas = $consulta->fetch_assoc()){
                $propuestas[] = $filas;
                $i++;
            }
            $total = $i;
            return $total;
        }
        //Metodo para el query que retorna el numero de paginas en las que se seccionara la paginacion
        public function total_paginas(){
            $num_per_page = 04;
            $totalrecord = $this->total_propuestas();
            $totalpages = ceil($totalrecord/$num_per_page);
            
            return $totalpages;
        }
        //Metodo para la obtencion de todos los datos de la tabla propuesta para mostarla a los usuarios
        public function acceder_propuesta($id_propuesta){
            try{
                $consulta= $this->db->query("select * from propuesta_proyecto where id_propuesta ='$id_propuesta';");
            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
            while($filas= $consulta->fetch_assoc()){
                $acceso_propuesta[] = $filas; 

            }
            return $acceso_propuesta;


        }
        //Obtencion de los años de la propuesta que se selecciona para ver los detalles
        public function acceder_anios_propuesta($id_propuesta){
            try{
                $consulta = $this->db->query("select id_ano from ano_proyecto where id_propuesta ='$id_propuesta'");
            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
            while($filas= $consulta->fetch_assoc()){
                $acceso_propuesta[] = $filas; 

            }
            return $acceso_propuesta;
        }
        //Obtencion de las facultades de la propuesta que se selecciona para ver los detalles
        public function acceder_facultades_propuesta($id_propuesta){
            try{
                $consulta = $this->db->query("select id_facultad from facultad_propuesta where id_propuesta ='$id_propuesta'");
            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
            
            while($filas= $consulta->fetch_assoc()){
                $acceso_propuesta[] = $filas; 

            }
            return $acceso_propuesta;
        }
        //Metodo con el query para actualizar el estado de la propuesta a aprobado
        public function aprobar_propuesta($id_propuesta){
            $sql = "UPDATE propuesta_proyecto SET id_estado = '1' WHERE id_propuesta = '$id_propuesta';";
            try{
                $this->db->query($sql);

            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }


            try{
                $consulta = $this->db->query("SELECT * FROM propuesta_proyecto WHERE id_propuesta = '$id_propuesta';");

            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
            
            while($filas= $consulta->fetch_assoc()){
                echo'Hola';
                $nuevo_proyecto[] = $filas; 

            }
            
            try{
                /*$insert = $this->db->query("INSERT INTO proyecto(nombre_pro, id_propuesta, lugar_pro, fecha_pro, hora_inicio_pro, hora_final_pro, participantes_pro, descripcion_pro, objetivo_pro, materiales_pro, nombre_encarg, cedula_encarg, telefono_encarg, correo_encarg, perfil_estu_pro)
                                                VALUES('$nuevo_proyecto[nombre_pro]', '$id_propuesta', '$nuevo_proyecto[lugar_pro]', '$nuevo_proyecto[fecha_pro]', '$nuevo_proyecto[hora_inicio_pro]', '$nuevo_proyecto[hora_final_pro]', '$nuevo_proyecto[participantes_pro]', '$nuevo_proyecto[descripcion_pro]', '$nuevo_proyecto[objetivo_pro]', '$nuevo_proyecto[materiales_pro]', '$nuevo_proyecto[nombre_encarg]', '$nuevo_proyecto[cedula_encarg]', '$nuevo_proyecto[telefono_encarg]', '$nuevo_proyecto[correo_encarg]', '$nuevo_proyecto[perfil_estu_pro]');");
            */


            $a = array();
            $a = $nuevo_proyecto[0];
            $insert = $this->db->query("INSERT INTO proyecto(nombre_pro, id_propuesta, lugar_pro, fecha_pro, hora_inicio_pro, hora_final_pro, participantes_pro, descripcion_pro, objetivo_pro, materiales_pro, nombre_encarg, cedula_encarg, telefono_encarg, correo_encarg, perfil_estu_pro)
                                                VALUES('$a[nombre_pro]', '$id_propuesta', '$a[lugar_pro]', '$a[fecha_pro]', '$a[hora_inicio_pro]', '$a[hora_final_pro]', '$a[participantes_pro]', '$a[descripcion_pro]', '$a[objetivo_pro]', '$a[materiales_pro]', '$a[nombre_encarg]', '$a[cedula_encarg]', '$a[telefono_encarg]', '$a[correo_encarg]', '$a[perfil_estu_pro]');");

            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }

            
        }
        //Metodo con el query para actualizar el estado de la propuesta a rechazada
        public function rechazar_propuesta($id_propuesta, $motivo){
            $sql = "UPDATE propuesta_proyecto SET id_estado = '2', motivo_rechazo = '$motivo' WHERE id_propuesta = '$id_propuesta';";
            try{
                $this->db->query($sql);

            }catch(Exception $e){
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }

        }
        
        
    }
