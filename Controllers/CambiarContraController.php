<?php
require_once $_SERVER['/var/www/html'].'Models/CambiarContraModel.php';

class CambiarContraController{


    function __construct()
    {

    }

    function cambiar_contrasena($datos){
        $cambiarContra= new CambiarContraModel();
        $cambiarContra->cambiarContrasena($datos);
        if($cambiarContra->cambiarContra_exitoso == True){
            require_once $_SERVER['/var/www/html'].'Views/Layouts/cambiar_contrasena_exitoso.php';
        }
        elseif($cambiarContra->cambiarContra_exitoso == False){
            require_once $_SERVER['/var/www/html'].'Views/Layouts/cambiar_contrasena_fallido2.php';
        }
        //require_once $_SERVER['/var/www/html'].'index.php';


    }

}


?>