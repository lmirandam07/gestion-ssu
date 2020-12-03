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

    }
?>