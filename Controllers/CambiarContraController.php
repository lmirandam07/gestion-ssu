<?php
require_once $_SERVER['/var/www/html'].'Models/CambiarContraModel.php';

class CambiarContraController{

    function __construct()
    {

    }

    function cambiar_contrasena($datos){
        $cambiarContra= new CambiarContraModel();
        $cambiarContra->cambiarContrasena($datos);
        //Si las condiciones descritas en CambiarContraModel se cumplen, el sistema le muestra un pantalla de exitoso al usuario
        if($cambiarContra->cambiarContra_exitoso == True){
            require_once $_SERVER['/var/www/html'].'Views/Layouts/cambiar_contrasena_exitoso.php';
        }
        //Si las condiciones descritas en CambiarContraModel no se cumplen, el sistema le muestra un pantalla de error al usuario
        elseif($cambiarContra->cambiarContra_exitoso == False){
            require_once $_SERVER['/var/www/html'].'Views/Layouts/cambiar_contrasena_fallido2.php';
        }
    }
}
?>