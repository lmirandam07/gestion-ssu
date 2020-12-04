<?php
require_once $_SERVER['/var/www/html'].'Models/UsuarioModel.php';
session_start();

class UsuarioController{


    function __construct()
    {

    }

    function registrar($datos){
        $registro= new UsuarioModel();
        $registro->registrarUsuarios($datos);
        require_once $_SERVER['/var/www/html'].'index.php';


    }

    function verPerfil($correo){
        $cliente=new UsuarioModel();
        $datos=$cliente->obtenerPerfil($correo);
        require_once $_SERVER['/var/www/html'].'Views/Estudiante/ver_perfil.php';
        
    }
    
}


?>