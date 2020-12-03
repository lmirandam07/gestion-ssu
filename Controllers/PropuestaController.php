<?php 

require_once $_SERVER['/var/www/html'].'Models/PropuestaModel.php';

class PropuestaController
{

	function __construct()
	{
		
	}
    
	function ver_propuestas($start_from){
		$propuesta= new PropuestaModel();
        $paginas = $propuesta->total_paginas();
        $start_from = 0;
        $datos = $propuesta->obtener_propuestas($start_from);
		require_once $_SERVER['/var/www/html'].'/Views/Administrador/ver_propuestas.php';
	}

    function registrar_propuesta($datos){
        $propuesta= new PropuestaModel();
        $propuesta->insertar_propuesta($datos);
        require_once $_SERVER['/var/www/html'].'index.php';
    }

}
?>