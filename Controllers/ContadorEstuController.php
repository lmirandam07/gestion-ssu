<?php
require_once $_SERVER['/var/www/html'].'../../Models/ContadorEstuModel.php';

class ContadorEstuController{

    function __construct()
    {

    }
    //Regresa los valores de contador_horas
    function contador_horas(){
        $contadorHoras= new  ContadorEstuModel();
        return $contadorHoras->contadorHoras();
    }
    //Regresa los valores de contador_proyectoI
    function contador_proyectoI(){
        $contadorProyectoI= new  ContadorEstuModel();
        return $contadorProyectoI->contadorProyectoI();
    }
}

?>