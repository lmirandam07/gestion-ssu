<?php 

    require_once $_SERVER['/var/www/html']. 'Models/PropuestaModel.php';
    //require_once('../Models/PropuestaModel.php');

    class PropuestaController
    {

        function __construct()
        {
            
        }
        
        function ver_propuestas(){
            $propuesta = new PropuestaModel();
            //$paginas = $propuesta->total_paginas();
            $datos = $propuesta->obtener_propuestas();
            //require_once $_SERVER['/var/www/html'].'Views/Administrador/ver_propuestas.php';
            require_once('./Views/Administrador/ver_propuestas.php');
        }

        function registrar_propuesta($datos,$facultades,$anios){
            $propuesta= new PropuestaModel();
            $propuesta->insertar_propuesta($datos);
            $propuesta->insertar_facultad_anio_propuesta($facultades,$anios);
            require_once $_SERVER['/var/www/html'].'index.php';
        }

    }
?>