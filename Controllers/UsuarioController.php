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
    function verPerfil($correo){
        $cliente=new UsuarioModel();
        $datos=$cliente->obtenerPerfil($correo);
        $data=$cliente->obtenerHoras($correo);
        $usuario=$cliente->obtenerProyectosUsuario($correo);
        $cantidad=$cliente->totalProyectos($correo);
        require_once $_SERVER['/var/www/html'].'Views/Estudiante/ver_perfil.php';
        
    }
    //funcion para inscribir a un usuario en un proyecto
    function inscribirse($correo,$id_proyecto){
        $usuario = new UsuarioModel();
        $usuario->inscribirse($correo,$id_proyecto);
        require_once $_SERVER['/var/www/html'].'Views/Layouts/estudiante_inscrito.php';
    }
    
}


?>