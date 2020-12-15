<?php

require_once $_SERVER['/var/www/html'] . 'Models/PropuestaModel.php';
//require_once('../Models/PropuestaModel.php');

class PropuestaController
{

    function __construct()
    {
    }
    //Metodo que muestra 4 propuestas por cada pagina dentro de la paginacion
    function ver_propuestas($page)
    {
        $propuesta = new PropuestaModel();
        $paginas = $propuesta->total_paginas();
        $datos = $propuesta->obtener_propuestas($page);
        $active = intval($page);
        $cantidad = $propuesta->total_propuestas();
        require_once('./Views/Administrador/ver_propuestas.php');
    }

    /*Metodo que pasa la informacion de los datos, años y facultades a la clase Model para su insercion
         en sus respectivas tablas*/
    function registrar_propuesta($datos, $facultades, $anios)
    {

        $hora_inicio_pro = $datos['hora_inicio_pro'];
        $hora_inicio = new DateTime($hora_inicio_pro);
        $hora_inicio = $hora_inicio->format('H:i');

        $hora_final_pro = $datos['hora_final_pro'];
        $hora_final = new DateTime($hora_final_pro);
        $hora_final = $hora_final->format('H:i');

        $fecha_pro = $datos['fecha_pro'];
        $fecha = new DateTime($fecha_pro);
        $fecha = $fecha->format('Ymd');

        $fecha_hoy = date('Ymd');

        $fecha_final = date('Ymd', strtotime('+1 years'));


        if ($fecha_hoy > $fecha) {

            require_once $_SERVER['/var/www/html'] . 'Views/Layouts/registro_fallido_fecha.php';
        }
          else {

            if($fecha>$fecha_final){
                require_once $_SERVER['/var/www/html'] . 'Views/Layouts/registro_fallido_fecha_futuro.php';
            }
            else{
                if ($hora_final > $hora_inicio) {

                    $propuesta = new PropuestaModel();
                    $propuesta->insertar_propuesta($datos);
                    $propuesta->insertar_facultad_anio_propuesta($facultades, $anios);
                    /*Condicional para mostrar si la propuesta se realizo de manera exitoso o no  
                        dependiendo si en el Model el query se compilo exitosamente*/
                    if ($propuesta->registro_exitoso == True) {
                        require_once $_SERVER['/var/www/html'] . 'Views/Layouts/registro_exitoso.php';
                    } else {
                        $mensaje = "La propuesta no se ha registrado correctamente. Vuelva a intentarlo";
                        $_SESSION['mensaje_error'] = $mensaje;
                        require_once $_SERVER['/var/www/html'] . 'Views/Layouts/registro_fallido.php';
                    }
                } else {
                    require_once $_SERVER['/var/www/html'] . 'Views/Layouts/registro_fallido_hora.php'; //Crear un modal que diga que la hora final debe ser mayor
                }
            }
        
        }

        
    }

    /*Metodo que pasa el id de la propuesta al Model para que obtenga los detalles de la propuesta que 
        se quiere observar para aceptar o rechazar*/
    function acceder_propuesta($id_propuesta)
    {
        $propuesta = new PropuestaModel();
        $datos = $propuesta->acceder_propuesta($id_propuesta);
        $anios = $propuesta->acceder_anios_propuesta($id_propuesta);
        $facultades = $propuesta->acceder_facultades_propuesta($id_propuesta);
        require_once $_SERVER['/var/www/html'] . 'Views/Administrador/propuesta_proyecto.php';
    }
    /*Metodo que pasa el id de la propuesta que se quiere aprobar al Model para realizar el query de Update*/
    function aprobar_propuesta($id_propuesta)
    {
        $propuesta = new PropuestaModel();
        $propuesta->aprobar_propuesta($id_propuesta);
        require_once $_SERVER['/var/www/html'] . 'Views/Layouts/aprobar_propuesta.php';
    }
    /*Metodo que pasa el id de la propuesta que se quiere rechazar al Model para realizar el query de Update*/
    function rechazar_propuesta($id_propuesta, $motivo)
    {
        $propuesta = new PropuestaModel();
        $propuesta->rechazar_propuesta($id_propuesta, $motivo);
        require_once $_SERVER['/var/www/html'] . 'Views/Layouts/rechazar_propuesta.php';
    }
}
