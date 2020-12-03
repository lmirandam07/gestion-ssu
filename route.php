<?php

    $controller = 'Home';

    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    }
    
    function ingresar_propuesta(){    
        require_once('./Controllers/PropuestaController.php');   
        $datos = [];
        $facultades=[];
        $anios = [];
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
        if(!empty($_POST['facultad'])){
            for($i=0;$i<=count($_POST['facultad']);$i++){
                $facultades[$i] =$_POST['facultad'][$i];
            }
        }
        if(!empty($_POST['anio'])){
            for($i=0;$i<=count($_POST['anio']);$i++){
                $anios[$i] =$_POST['anio'][$i];
            }
        }

        $ingresar_datos = new  PropuestaController();
        $ingresar_datos->registrar_propuesta($datos,$facultades,$anios);
    
    }

    function registrar_usuario(){
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

    function ver_propuestas(){
        $page = $_GET['Page'];
        
        require_once('./Controllers/PropuestaController.php');

        $controller = new PropuestaController();
        $controller->ver_propuestas($page);
    }

    function inicio_sesion() {
        require_once('./Controllers/SesionController.php');
        $datos = [];
        $datos['correo'] = $_POST['correo'];
        $datos['contrasena'] = $_POST['contrasena'];

        $controller = new SesionController();
        $controller->inicio_sesion($datos);
    }

    function cambiar_contra(){
        require_once('./Controllers/CambiarContraController.php');
        $datos=[];
        $datos['correo']=$_POST['correo'];
        $datos['nueva_contra']=$_POST['nueva_contra'];
        $datos['verif_nueva_contra']=$_POST['verif_nueva_contra'];

        $ingresar_datos=new CambiarContraController();
        $ingresar_datos->cambiar_contrasena($datos);
        }

        function ver_perfil(){
            require_once('./Controllers/UsuarioController.php');
            $controller= new UsuarioController();
            $controller->verPerfil();
    
        }
        
    switch ($controller) {
        case 'Propuesta':
            ingresar_propuesta();
            break;

        case 'Registrar':
            registrar_usuario();
            break;

        case 'Ver_Propuestas':
            ver_propuestas();
            break;

        case 'Inicio_Sesion':
            inicio_sesion();
            break;

        case 'Cambiar_Contrasena';
            cambiar_contra();
            break;

        case 'Ver_perfil';
            ver_perfil();
            break;
    }
    ?>