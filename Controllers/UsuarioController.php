<?php
require_once $_SERVER['/var/www/html'].'Models/UsuarioModel.php';
session_start();

class UsuarioController{


    function __construct()
    {

    }
    //funcion para registrar un usuario nuevo en el sistema
    function registrar($datos){
        $registro= new UsuarioModel();
        $registro->registrarUsuarios($datos);
        if($registro->registro_exitoso == True){
    //dependiendo del resultado del registro, se lleva al usuario a la pantalla correspondiente
            require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_usuario_exitoso.php';
        }
        else{
            require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_usuario_fallido.php';
        }



    }
    //funcion para obtener el perfil de un usuario de la base de datos
    function verPerfil($correo,$page){
        
        $cliente=new UsuarioModel();
        $paginas = $cliente->total_paginas();
        $datos=$cliente->obtenerPerfil($correo);
        $data=$cliente->obtenerHoras($correo);
        $usuario=$cliente->obtenerProyectosUsuario($correo,$page);
        $cantidad=$cliente->totalProyectos($correo);
        
        $dato = $cliente->obtener_propuestas($page);
        $active = intval($page);
        require_once $_SERVER['/var/www/html'].'Views/Estudiante/ver_perfil.php';
        
    }


    //funcion para inscribir a un usuario en un proyecto
    function inscribirse($correo,$id_proyecto, $img){
        $usuario = new UsuarioModel();
        $num_img = $img;
        $usuario->inscribirse($correo,$id_proyecto);
        require_once $_SERVER['/var/www/html'].'Views/Layouts/estudiante_inscrito.php';
    }

   

    function proyecto($id_proyecto,$img){
        $proyecto = new UsuarioModel();
        $datos = $proyecto->informacion_proyecto($id_proyecto);
        $facultades = $proyecto->facultad_proyecto($id_proyecto);
        $anios = $proyecto->ano_proyecto($id_proyecto);
        $correo = $_SESSION['usuario_actual'];
        $num_img = intval($img);
        $inscrito = $proyecto->estudiante_inscrito($correo, $id_proyecto);
        require_once('./Views/General/proyecto.php');
    }
    
}


?>