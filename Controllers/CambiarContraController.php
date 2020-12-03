<?php
require_once $_SERVER['/var/www/html'].'Models/CambiarContraModel.php';

class CambiarContraController{


    function __construct()
    {

    }

    function cambiar_contrasena($datos){
        $cambiarContra= new CambiarContraModel();
        $cambiarContra->cambiarContrasena($datos);
        require_once $_SERVER['/var/www/html'].'index.php';


    }

}


?>