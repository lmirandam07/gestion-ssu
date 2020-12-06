<?php
require_once $_SERVER['/var/www/html'].'../../Models/ContadorAdminModel.php';

class ContadorAdminController{

    function __construct()
    {

    }
    //Regresa los valores de contador_propuesta
    function contador_propuesta(){
        $contadorPropuesta= new  ContadorAdminModel();
        return $contadorPropuesta->contadorPropuesta();
    }
    //Regresa los valores de contador_proyectos
    function contador_proyecto(){
        $contadorProyecto= new  ContadorAdminModel();
        return $contadorProyecto->contadorProyecto();
    }
    
}
?>