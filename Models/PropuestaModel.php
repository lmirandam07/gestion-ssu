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

            $hora_inicio_pro = $datos['hora_inicio_pro'];
            $hora_inicio = new DateTime($hora_inicio_pro);
            $hora_inicio = $hora_inicio->format('H:i');

            $hora_final_pro = $datos['hora_final_pro'];
            $hora_final = new DateTime($hora_final_pro);
            $hora_final = $hora_final->format('H:i');

            $fecha_pro = $datos['fecha_pro'];
            $fecha = new DateTime($fecha_pro);
            $fecha = $fecha->format('Ymd');

            $fecha_hoy = date('Ymd');

            $fecha_final = date('Ymd', strtotime('+1 years'));

            //Nombre completo
            if( intval(strlen($datos['nombre_encarg'])) == 0 ){ //CP-003
                $mensaje = "Debe ingresar un nombre de encargado. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['nombre_encarg'])) < 5 ){ //CP-002
                $mensaje = "El nombre del encargado debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
            }

            //Cédula
            elseif( intval(strlen($datos['cedula_encarg'])) == 0 ){ //CP-007
                $mensaje = "Debe ingresar una cédula. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['cedula_encarg'])) < 9 ){ //CP-005
                $mensaje = "La cédula debe contener como mínimo 9 caracteres. Vuelva a intentarlo";
            }

            //Teléfono celular
            elseif( intval(strlen($datos['telefono_encarg'])) == 0 ){ //CP-008, CP-011
                $mensaje = "Debe ingresar un teléfono celular. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['telefono_encarg'])) < 7 ){ //CP-009
                $mensaje = "El teléfono celular debe contener como mínimo 7 números. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['telefono_encarg'])) > 8 ){ //CP-010
                $mensaje = "La cédula debe contener como máximo 8 números. Vuelva a intentarlo";
            }

            //Correo electrónico
            elseif( intval(strlen($datos['correo'])) == 0 ){ //CP-014
                $mensaje = "Debe ingresar un correo electrónico. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['correo'])) < 12 ){ //CP-012
                $mensaje = "El correo electrónico debe contener como mínimo 12 caracteres. Vuelva a intentarlo";
            }

            //Perfil de Estudiante
            elseif( intval(strlen($datos['perfil_estu_pro'])) == 0 ){ //CP-017
                $mensaje = "Debe ingresar un perfil de estudiante. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['perfil_estu_pro'])) < 5 ){ //CP-015
                $mensaje = "El perfil de estudiante debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
            }

            //Nombre
            elseif( intval(strlen($datos['nombre_pro'])) == 0 ){ //CP-022
                $mensaje = "Debe ingresar un nombre de proyecto. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['nombre_pro'])) < 5 ){ //CP-020
                $mensaje = "El nombre del proyecto debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
            }

            //Lugar
            elseif( intval(strlen($datos['lugar_pro'])) == 0 ){ //CP-025
                $mensaje = "Debe ingresar un lugar de proyecto. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['lugar_pro'])) < 5 ){ //CP-023
                $mensaje = "El lugar de proyecto debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
            }

            //Cantidad de Estudiantes
            elseif( empty($datos['participantes_pro']) ){ //CP-036, CP-039
                $mensaje = "Debe ingresar como mínimo un participante de proyecto. Vuelva a intentarlo";
            }
            elseif( intval($datos['participantes_pro']) < 0 ){ //CP-037
                $mensaje = "Debe ingresar una cantidad de participantes positiva. Vuelva a intentarlo";
            }
            elseif( intval($datos['participantes_pro']) > 200 ){ //CP-038
                $mensaje = "La cantidad de participantes debe ser como máximo 200. Vuelva a intentarlo";
            }

            //Descripción
            elseif( intval(strlen($datos['describ_pro'])) == 0 ){ //CP-042
                $mensaje = "Debe ingresar una descripción de proyecto. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['describ_pro'])) < 5 ){ //CP-040
                $mensaje = "La descripción del proyecto debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
            }

            //Objetivo
            elseif( intval(strlen($datos['objetivo_pro'])) == 0 ){ //CP-045
                $mensaje = "Debe ingresar un objetivo de proyecto. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['objetivo_pro'])) < 5 ){ //CP-043
                $mensaje = "El objetivo del proyecto debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
            }

            //Materiales
            elseif( intval(strlen($datos['materiales_pro'])) == 0 ){ //CP-048
                $mensaje = "Debe ingresar un material de proyecto. Vuelva a intentarlo";
            }
            elseif( intval(strlen($datos['materiales_pro'])) < 5 ){ //CP-046
                $mensaje = "Los materiales del proyecto debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
            }

            //Fecha
            elseif ($fecha_hoy > $fecha) { //CP-026
                $mensaje = 'Se debe seleccionar una fecha futura. Vuelva a intentarlo';
            }
            elseif ($fecha>$fecha_final){ //CP-027
                $mensaje = 'El límite máximo para una propuesta es hasta un año de la fecha actual. Vuelva a intentarlo';
            }
            elseif($fecha == $fecha_hoy){ //CP-028
                $mensaje = "Debe ingresar una fecha diferente a la de hoy. Vuelva a intentarlo";
            }

            //Hora Inicio
            elseif(empty($datos['hora_inicio_pro'])){ //CP-032
                $mensaje = 'Debe ingresar una hora de inicio. Vuelva a intentarlo.';
            }
            elseif($hora_inicio < '04:00'){ //CP-029
                $mensaje = 'La hora de inicio debe ser como mínimo a las 4:00 AM. Vuelva a intentarlo.';
            }
            elseif($hora_inicio > '21:00'){ //CP-030
                $mensaje = 'La hora de inicio debe ser como máximo a las 9:00 PM. Vuelva a intentarlo.';
            }

            //Hora Final
            elseif(empty($datos['hora_final_pro'])){ //CP-035
                $mensaje = 'Debe ingresar una hora de final. Vuelva a intentarlo.';
            }
            elseif($hora_final > '21:00'){ //CP-033
                $mensaje = 'La hora de final debe ser como máximo a las 9:00 PM. Vuelva a intentarlo.';
            }
            elseif($hora_inicio > $hora_final){ //CP-031, CP-034
                $mensaje = 'La hora de inicio debe ser menor que la hora final. Vuelva a intentarlo.';
            }


            if( intval(strlen($datos['nombre_encarg'])) >= 5 and intval(strlen($datos['nombre_encarg'])) <= 80 and
                intval(strlen($datos['cedula_encarg'])) >= 9 and intval(strlen($datos['cedula_encarg'])) <= 20 and
                intval(strlen($datos['telefono_encarg'])) >= 7 and intval(strlen($datos['telefono_encarg'])) <= 8 and
                intval(strlen($datos['correo'])) >= 12 and intval(strlen($datos['correo'])) <=30 and
                intval(strlen($datos['perfil_estu_pro'])) >= 5 and intval(strlen($datos['perfil_estu_pro'])) <= 250 and
                intval(strlen($datos['nombre_pro'])) >= 5 and intval(strlen($datos['nombre_pro'])) <= 50 and
                intval(strlen($datos['lugar_pro'])) >= 5 and intval(strlen($datos['lugar_pro'])) <= 50 and
                intval($datos['participantes_pro']) >= 1 and intval($datos['participantes_pro']) <= 200 and
                intval(strlen($datos['describ_pro'])) >= 5 and intval(strlen($datos['describ_pro'])) <=250 and
                intval(strlen($datos['objetivo_pro'])) >= 5 and intval(strlen($datos['objetivo_pro'])) <=250 and
                intval(strlen($datos['materiales_pro'])) >= 5 and intval(strlen($datos['materiales_pro'])) <=250 and
                $fecha > $fecha_hoy and $fecha < $fecha_final and
                !empty($datos['hora_inicio_pro']) and $hora_inicio >= '04:00' and $hora_inicio <= '21:00' and
                !empty($datos['hora_final_pro']) and $hora_final <= '21:00' and
                $hora_final > $hora_inicio
            ){

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

                    if (!$this->db->query($sql)){
                        return False;
                    }
                    //$this->registro_exitoso = True;
                    return True;


                }
                catch(Exception $e){
                    echo 'Error encontrado: ', $e->getMessage(), "\n";
                }

            }
            else{
                $_SESSION['mensaje_error'] = $mensaje;
                return False;
                //require_once $_SERVER['/var/www/html'] . 'Views/Layouts/registro_fallido.php';
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
            $tamano_anios=count((array)$anios);
            $tamano_facultad=count((array)$facultades);
            $arr_tamanos = array();
            $arr_tamanos[0] = $tamano_anios;
            $arr_tamanos[1] = $tamano_facultad;
            return $arr_tamanos;
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

            if(!$this->db->query($sql)) {
                return False;
            }
            $consulta = $this->db->query("SELECT * FROM propuesta_proyecto WHERE id_propuesta = '$id_propuesta';");

            while($filas= $consulta->fetch_assoc()){

                $nuevo_proyecto[] = $filas;

            }

            
                

            $a = array();
            $a = $nuevo_proyecto[0];

            $insert = "INSERT INTO proyecto(nombre_pro, id_propuesta, lugar_pro, fecha_pro, hora_inicio_pro, hora_final_pro, participantes_pro, descripcion_pro, objetivo_pro, materiales_pro, nombre_encarg, cedula_encarg, telefono_encarg, correo_encarg, perfil_estu_pro) VALUES('$a[nombre_pro]', '$id_propuesta', '$a[lugar_pro]', '$a[fecha_pro]', '$a[hora_inicio_pro]', '$a[hora_final_pro]', '$a[participantes_pro]', '$a[descripcion_pro]', '$a[objetivo_pro]', '$a[materiales_pro]', '$a[nombre_encarg]', '$a[cedula_encarg]', '$a[telefono_encarg]', '$a[correo_encarg]', '$a[perfil_estu_pro]');";

            if(!$this->db->query($insert)) {
                return False;
            }

            return True;

        }
        //Metodo con el query para actualizar el estado de la propuesta a rechazada
        public function rechazar_propuesta($id_propuesta, $motivo){
            if(intval(strlen($motivo)) == 0){
                $mensaje = 'Debe ingresar un motivo de rechazo. Vuelva a intentarlo.';
            }
            elseif(intval(strlen($motivo)) < 5){
                $mensaje = 'El motivo de rechazo debe tener como mínimo 5 caracteres. Vuelva a intentarlo.';
            }
            elseif(intval(strlen($motivo)) > 250){
                $mensaje = 'El motivo de rechazo debe tener como máximo 250 caracteres. Vuelva a intentarlo.';
            }

            if( intval(strlen($motivo)) >= 5 and intval(strlen($motivo)) <= 250){
                $sql = "UPDATE propuesta_proyecto SET id_estado = '2', motivo_rechazo = '$motivo' WHERE id_propuesta = '$id_propuesta';";

                if ($this->db->query($sql) == True){
                    return True;
                }
                else{
                    return False;
                }

            }
            else{
                $_SESSION['mensaje_error'] = $mensaje;
                return False;
            }


        }


    }
