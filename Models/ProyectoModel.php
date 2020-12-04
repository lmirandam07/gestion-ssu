<?php
    require_once $_SERVER['/var/www/html'] .'db/db.php';
    Class ProyectoModel{
        private $db;
        private $proyectos;
        private $info_proyecto;

        public function __construct(){
            $this->db = Db::conexion();
            $this->proyectos = array();
            $this->info_proyecto = array();
        }

        public function obtener_proyecto($page){
            $num_per_page = 04;
            $start_from = (intval($page)-1)*$num_per_page;
            $consulta = $this->db->query("select id_proyecto, nombre_pro, descripcion_pro from proyecto limit $start_from,$num_per_page;");
            while($filas = $consulta->fetch_assoc()){
                $proyectos[] = $filas;
            }
            return $proyectos;
        }

        public function total_proyectos(){
            $consulta = $this->db->query("select * from proyecto;");
            $i = 0;
            while($filas = $consulta->fetch_assoc()){
                $proyectos[] = $filas;
                $i++;
            }
            $total = $i;
            return $total;
        }

        public function total_paginas(){
            $num_per_page = 04;
            $totalrecord = $this->total_proyectos();
            $totalpages = ceil($totalrecord/$num_per_page);
            
            return $totalpages;
        }

        public function informacion_proyecto($id_proyecto){
            $id = intval($id_proyecto);
            $consulta = $this->db->query("select * from proyecto where id_proyecto = $id;");
            while($filas = $consulta->fetch_assoc()){
                $info_proyecto[] = $filas;
            }
            return $info_proyecto;
        }
        
    }
