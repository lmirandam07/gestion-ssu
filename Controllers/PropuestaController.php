<?php 

    require_once $_SERVER['/var/www/html']. 'Models/PropuestaModel.php';
    //require_once('../Models/PropuestaModel.php');

    class PropuestaController
    {

        function __construct()
        {
            
        }
        
        function ver_propuestas($page){
            $propuesta = new PropuestaModel();
            $paginas = $propuesta->total_paginas();
            $datos = $propuesta->obtener_propuestas($page);
            require_once('./Views/Administrador/ver_propuestas.php');
        }

        function registrar_propuesta($datos){
            $propuesta= new PropuestaModel();
            $propuesta->insertar_propuesta($datos);
            require_once $_SERVER['/var/www/html'].'index.php';
        }

    }
?>