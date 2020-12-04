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
        if($propuesta->registro_exitoso == True){
            require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_exitoso.html';
        }
        else{
            require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_fallido.html';
        }
        require_once $_SERVER['/var/www/html'].'index.php';


    }

    function verPerfil($correo){
        $cliente=new UsuarioModel();
        $datos=$cliente->obtenerPerfil($correo);
        $data=$cliente->obtenerHoras($correo);
        $usuario=$cliente->obtenerProyectosUsuario($correo);
        require_once $_SERVER['/var/www/html'].'Views/Estudiante/ver_perfil.php';
        
    }
    
}


?>