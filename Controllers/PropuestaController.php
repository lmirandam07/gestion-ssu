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
            $active = intval($page);
            require_once('./Views/Administrador/ver_propuestas.php');
        }

        function registrar_propuesta($datos,$facultades,$anios){
            $propuesta= new PropuestaModel();
            $propuesta->insertar_propuesta($datos);
            $propuesta->insertar_facultad_anio_propuesta($facultades,$anios);
            if($propuesta->registro_exitoso == True){
                require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_exitoso.html';
            }
            else{
                require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_fallido.html';
            }
            
            //require_once $_SERVER['/var/www/html'].'index.php';
        }
        function acceder_propuesta($id_propuesta){
            $propuesta = new PropuestaModel();
            $datos = $propuesta->acceder_propuesta($id_propuesta);
            require_once $_SERVER['/var/www/html'].'Views/Administrador/propuesta_proyecto.php';


        }

    }
?>