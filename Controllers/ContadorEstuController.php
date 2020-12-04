<?php
require_once $_SERVER['/var/www/html'].'../../Models/ContadorEstuModel.php';

class ContadorEstuController{


    function __construct()
    {

    }

    function contador_horas(){
        $contadorHoras= new  ContadorEstuModel();
        return $contadorHoras->contadorHoras();
    }

    function contador_proyectoI(){
        $contadorProyectoI= new  ContadorEstuModel();
        return $contadorProyectoI->contadorProyectoI();
    }

}


?>