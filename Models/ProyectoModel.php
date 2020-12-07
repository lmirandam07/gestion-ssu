<?php
require_once $_SERVER['/var/www/html'] . 'db/db.php';
class ProyectoModel
{
    private $db;
    private $proyectos;
    private $info_proyecto;
    private $facultad_proyecto;
    private $ano_proyecto;

    public function __construct()
    {
        $this->db = Db::conexion();
        $this->proyectos = array();
        $this->info_proyecto = array();
        $this->facultad_proyecto = array();
        $this->ano_proyecto = array();
    }

    public function obtener_proyecto($page)
    {
        $num_per_page = 04;
        $start_from = (intval($page) - 1) * $num_per_page;

        try {
            $consulta = $this->db->query("select id_proyecto, nombre_pro, descripcion_pro from proyecto limit $start_from,$num_per_page;");

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        while ($filas = $consulta->fetch_assoc()) {
            $proyectos[] = $filas;
        }
        return $proyectos;
    }

    public function total_proyectos()
    {
        try {
            $consulta = $this->db->query("select * from proyecto;");

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        $i = 0;
        while ($filas = $consulta->fetch_assoc()) {
            $proyectos[] = $filas;
            $i++;
        }
        $total = $i;
        return $total;
    }

    public function total_paginas()
    {
        $num_per_page = 04;
        $totalrecord = $this->total_proyectos();
        $totalpages = ceil($totalrecord / $num_per_page);

        return $totalpages;
    }

    public function estudiante_inscrito($correo, $id_proyecto){
        $id = intval($id_proyecto);

        try {
            $consulta = $this->db->query("select id_usuario from usuario where correo = '$correo';");

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        $id_usuario = $consulta->fetch_assoc()['id_usuario'];

        try {
            $inscrito = $this->db->query("select * from proyecto_usuario where id_usuario = '$id_usuario' AND id_proyecto='$id_proyecto';");
            $this->actualizar_horas_estudiante($id_usuario, $id_proyecto);

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        if(mysqli_num_rows($inscrito) == 0){
            return False;
        }
        else{
            return True;
        }
    }

    public function actualizar_horas_estudiante($id_usuario, $id_proyecto) {
        // Seleccionar la cantidad de horas que dura un proyecto
        try {
            $horas_proyecto = $this->db->query("SELECT FORMAT(TIME_TO_SEC(TIMEDIFF(hora_final_pro, hora_inicio_pro)) / 3600, 0) AS diferencia FROM proyecto WHERE id_proyecto = '$id_proyecto';");
            $horas_proyecto = (int)$horas_proyecto->fetch_assoc()['diferencia'];

            if ($horas_proyecto) {
                // Actualizar cantidad de horas en cuenta del estudiante
                $this->db->query("UPDATE usuario SET total_horas = (total + '$horas_proyecto') WHERE id_usuario = '$id_usuario';");
            }

        } catch(Exception $e) {
            echo 'Error encontrado', $e->getMessage(), "\n";
        }
    }

    public function informacion_proyecto($id_proyecto)
    {
        $id = intval($id_proyecto);

        try {
            $consulta = $this->db->query("select * from proyecto where id_proyecto = $id;");

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        while ($filas = $consulta->fetch_assoc()) {
            $info_proyecto[] = $filas;
        }
        return $info_proyecto;
    }

    public function facultad_proyecto($id_proyecto)
    {
        $id = intval($id_proyecto);

        try {
            $id_propuesta = $this->db->query("select id_propuesta from proyecto where id_proyecto ='$id';");

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        if (mysqli_num_rows($id_propuesta) == 0) {
            return False;
        }
        $id_propuesta =  $id_propuesta->fetch_assoc()['id_propuesta'];


        try {
            $consulta = $this->db->query("select id_facultad from facultad_propuesta where id_propuesta ='$id_propuesta';");

        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        while ($filas = $consulta->fetch_assoc()) {
            $facultad_proyecto[] = $filas;
        }
        return $facultad_proyecto;
    }

    public function ano_proyecto($id_proyecto)
    {
        $id = intval($id_proyecto);
        $id_propuesta = $this->db->query("select id_propuesta from proyecto where id_proyecto ='$id';");

        try {
            $id_propuesta = $this->db->query("select id_propuesta from proyecto where id_proyecto ='$id';");
        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        if (mysqli_num_rows($id_propuesta) == 0) {
            return False;
        }
        $id_propuesta =  $id_propuesta->fetch_assoc()['id_propuesta'];

        try {
            $consulta = $this->db->query("select id_ano from ano_proyecto where id_propuesta ='$id_propuesta';");
        } catch(Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

        while ($filas = $consulta->fetch_assoc()) {
            $ano_proyecto[] = $filas;
        }
        return $ano_proyecto;
    }
}
