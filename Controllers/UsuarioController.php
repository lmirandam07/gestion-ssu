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
        if($registro->registro_exitoso == True){
            require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_usuario_exitoso.php';
        }
        else{
            require_once $_SERVER['/var/www/html'].'Views/Layouts/registro_usuario_fallido.php';
        }
        //require_once $_SERVER['/var/www/html'].'index.php';


    }

    function verPerfil($correo){
        $cliente=new UsuarioModel();
        $datos=$cliente->obtenerPerfil($correo);
        $data=$cliente->obtenerHoras($correo);
        $usuario=$cliente->obtenerProyectosUsuario($correo);
        $cantidad=$cliente->totalProyectos($correo);
        require_once $_SERVER['/var/www/html'].'Views/Estudiante/ver_perfil.php';
        
    }
    function inscribirse($correo,$id_proyecto){
        $usuario = new UsuarioModel();
        $usuario->inscribirse($correo,$id_proyecto);
        require_once $_SERVER['/var/www/html'].'Views/Layouts/estudiante_inscrito.php';
    }
    
}


?>