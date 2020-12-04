<?php
require_once $_SERVER['/var/www/html'].'../../Models/ContadorAdminModel.php';

class ContadorAdminController{


    function __construct()
    {

    }

    function contador_propuesta(){
        $contadorPropuesta= new  ContadorAdminModel();
        return $contadorPropuesta->contadorPropuesta();
    }

    function contador_proyecto(){
        $contadorProyecto= new  ContadorAdminModel();
        return $contadorProyecto->contadorProyecto();
    }

}


?>