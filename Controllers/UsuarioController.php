<?php
require_once $_SERVER['/var/www/html'].'Models/UsuarioModel.php';

class UsuarioController{


    function __construct()
    {

    }

    function registrar($datos){
        $registro= new UsuarioModel();
        $registro->registrarUsuarios($datos);
        require_once $_SERVER['/var/www/html'].'index.php';


    }

}


?>