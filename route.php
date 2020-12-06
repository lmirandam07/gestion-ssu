<?php
  session_start();
    $controller = 'Home';

    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    }


// Funciones para hacer de nexo con los controller y tomar los datos de POST

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
        $correo=$_SESSION['usuario_actual'];
        require_once('./Controllers/UsuarioController.php');
        $controller = new UsuarioController();
        $controller->verPerfil($correo);

    }



    function ver_proyectos(){
        $page = $_GET['Page'];

        require_once('./Controllers/ProyectoController.php');

        $controller = new ProyectoController();
        $controller->ver_proyectos($page);
    }

    function cerrar_sesion() {
        require_once('./Controllers/SesionController.php');
        $controller = new SesionController();
        $controller->cerrar_sesion();
    }

    function proyecto(){
        $proyecto = $_GET['Proyecto'];

        require_once('./Controllers/ProyectoController.php');

        $controller = new ProyectoController();
        $controller->proyecto($proyecto);
    }

    function acceder_propuesta(){
        $id_propuesta = $_GET['Propuesta'];
        require_once('./Controllers/PropuestaController.php');
        $controller = new PropuestaController();
        $controller->acceder_propuesta($id_propuesta);
    }
    function aprobar_propuesta(){
        $id_propuesta = $_GET['Propuesta'];
        require_once('./Controllers/PropuestaController.php');
        $controller = new PropuestaController();
        $controller->aprobar_propuesta($id_propuesta);

    }
    function rechazar_propuesta(){
        $id_propuesta = $_GET['Propuesta'];
        require_once('./Controllers/PropuestaController.php');
        $controller = new PropuestaController();
        $controller->rechazar_propuesta($id_propuesta);
    }
    function inscribirse(){
        $id_proyecto = $_GET['Proyecto'];
        $correo = $_SESSION['usuario_actual'];
        require_once('./Controllers/UsuarioController.php');
        $usuario = new UsuarioController();
        $usuario->inscribirse($correo,$id_proyecto);

    }


    //Switch que controla que funcion se va a ejecutar dependiendo del controller que se obtenga
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

        case 'Cambiar_Contrasena':
            cambiar_contra();
            break;

        case 'Ver_Perfil':
            ver_perfil();
            break;

        case 'Ver_Proyectos':
            ver_proyectos();
            break;

        case 'Cerrar_Sesion':
            cerrar_sesion();

        case 'Acceder':
            acceder_propuesta();
            break;

        case 'Proyecto':
            proyecto();
            break;
        case 'Aprobar':
            aprobar_propuesta();
            break;
        case 'Rechazar':
            rechazar_propuesta();
            break;
        case 'Inscribirse':
            inscribirse();
            break;
    }
    ?>