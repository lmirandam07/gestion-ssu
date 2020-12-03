<?php 
    if (isset($_GET['controller'])) { 
        $controller = $_GET['controller'];
    } else { 
        $controller = 'Home';
    }

    function registrar(){       
        require_once('./Controllers/PropuestaController.php');
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

    function registrarUsuario(){
        require_once('./Controllers/UsuarioController.php');
        
        $datos=[];
        $datos['nombre_us']=$_POST['nombre'];
        $datos['apellido_us']=$_POST['apellido'];
        $datos['correo']=$_POST['correo'];
        $datos['cedula_us']=$_POST['cedula'];
        $datos['contrasena']=$_POST['contra'];
        $datos['telefono']=$_POST['numero_contacto'];
        $datos['id_tipo_us']=$_POST['1'];
        $datos['facultad']=$_POST['facultad']; 
        $datos['validC']=$_POST['validarC']; 
        
        $ingresar_datos=new UsuarioController();
        $ingresar_datos->registrar($datos);
        }
    if($controller=='Propuesta'){
        registrar();
    }
    elseif($controller=='Registrar'){
        registrarUsuario();
    }
    
?>