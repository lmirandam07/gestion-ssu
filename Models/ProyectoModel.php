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
        $consulta = $this->db->query("select id_proyecto, nombre_pro, descripcion_pro from proyecto limit $start_from,$num_per_page;");
        while ($filas = $consulta->fetch_assoc()) {
            $proyectos[] = $filas;
        }
        return $proyectos;
    }

    public function total_proyectos()
    {
        $consulta = $this->db->query("select * from proyecto;");
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

    public function informacion_proyecto($id_proyecto)
    {
        $id = intval($id_proyecto);
        $consulta = $this->db->query("select * from proyecto where id_proyecto = $id;");
        while ($filas = $consulta->fetch_assoc()) {
            $info_proyecto[] = $filas;
        }
        return $info_proyecto;
    }

    public function facultad_proyecto($id_proyecto)
    {
        $id = intval($id_proyecto);
        $id_propuesta = $this->db->query("select id_propuesta from proyecto where id_proyecto ='$id';");
        if (mysqli_num_rows($id_propuesta) == 0) {
            return False;
        }
        $id_propuesta =  $id_propuesta->fetch_assoc()['id_propuesta'];

        $consulta = $this->db->query("select id_facultad from facultad_propuesta where id_propuesta ='$id_propuesta';");
        while ($filas = $consulta->fetch_assoc()) {
            $facultad_proyecto[] = $filas;
        }
        return $facultad_proyecto;
    }

    public function ano_proyecto($id_proyecto)
    {
        $id = intval($id_proyecto);
        $id_propuesta = $this->db->query("select id_propuesta from proyecto where id_proyecto ='$id';");
        if (mysqli_num_rows($id_propuesta) == 0) {
            return False;
        }
        $id_propuesta =  $id_propuesta->fetch_assoc()['id_propuesta'];

        $consulta = $this->db->query("select id_ano from ano_proyecto where id_propuesta ='$id_propuesta';");
        while ($filas = $consulta->fetch_assoc()) {
            $ano_proyecto[] = $filas;
        }
        return $ano_proyecto;
    }
}
