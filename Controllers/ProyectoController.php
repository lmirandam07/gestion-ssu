<?php 

    require_once $_SERVER['/var/www/html']. 'Models/ProyectoModel.php';
    //require_once('../Models/ProyectoModel.php');

    class ProyectoController
    {

        function __construct()
        {
            
        }
        
        function ver_proyectos($page){
            $proyecto = new ProyectoModel();
            $paginas = $proyecto->total_paginas();
            $datos = $proyecto->obtener_proyecto($page);
            $active = intval($page);
            require_once('./Views/General/ver_proyectos.php');
        }

        function proyecto($id_proyecto){
            $proyecto = new ProyectoModel();
            $datos = $proyecto->informacion_proyecto($id_proyecto);
            //$facultades = $proyecto->facultad_proyecto();
            require_once('./Views/General/proyecto.php');
        }

    }
