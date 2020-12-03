<?php 
    if (isset($_GET['controller'])) { 
        $controller = $_GET['controller'];
    } else { 
        $controller = 'Home';
    }
    require_once('./Controllers/PropuestaController.php');
    function registrar(){       
        $datos = [];
        $datos['nombre_encarg'] = $_POST['nombre_encargado'];
        $datos['cedula_encarg'] = $_POST['cedula'];
        $datos['telefono_encarg'] = $_POST['telefono'];
        $datos['correo'] = $_POST['correo'];
        $datos['perfil_estu_pro'] = $_POST['perfil'];
        $datos['nombre_pro'] = $_POST['nombre_proyecto'];
        $datos['lugar_pro'] = $_POST['lugar'];
        $datos['fecha_pro'] = $_POST['fecha'];
        $datos['hora_inicio_pro'] = $_POST['hora_inicio'];
        $datos['hora_final_pro'] = $_POST['hora_final'];
        $datos['participantes_pro'] = $_POST['cantidad'];
        $datos['describ_pro'] = $_POST['descripcion'];
        $datos['objetivo_pro'] = $_POST['objetivo'];
        $datos['materiales_pro'] = $_POST['materiales'];
        $ingresar_datos = new  PropuestaController();
        $ingresar_datos->registrar_propuesta($datos);
    
    }
    if($controller=='Propuesta'){
        registrar();
    }
    
?>