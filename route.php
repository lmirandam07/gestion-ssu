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

        //Nombre completo
        if( intval(strlen($datos['nombre_encarg'])) == 0 ){
            $mensaje = "Debe ingresar un nombre de encargado. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['nombre_encarg'])) < 5 ){
            $mensaje = "El nombre del encargado debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
        }

        //Cedula
        elseif( intval(strlen($datos['cedula_encarg'])) == 0 ){
            $mensaje = "Debe ingresar una cédula. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['cedula_encarg'])) < 9 ){
            $mensaje = "La cédula debe contener como mínimo 6 caracteres. Vuelva a intentarlo";
        }

        //Teléfono celular
        elseif( intval(strlen($datos['telefono_encarg'])) == 0 ){
            $mensaje = "Debe ingresar un teléfono celular. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['telefono_encarg'])) < 7 ){
            $mensaje = "El teléfono celular debe contener como mínimo 7 números. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['telefono_encarg'])) > 8 ){
            $mensaje = "La cédula debe contener como máximo 8 números. Vuelva a intentarlo";
        }

        //Correo electrónico
        elseif( intval(strlen($datos['correo'])) == 0 ){
            $mensaje = "Debe ingresar un correo electrónico. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['correo'])) < 11 ){
            $mensaje = "El correo electrónico debe contener como mínimo 11 caracteres. Vuelva a intentarlo";
        }

        //Perfil de Estudiante
        elseif( intval(strlen($datos['perfil_estu_pro'])) == 0 ){
            $mensaje = "Debe ingresar un perfil de estudiante. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['perfil_estu_pro'])) < 5 ){
            $mensaje = "El perfil de estudiante debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
        }

        //Nombre
        elseif( intval(strlen($datos['nombre_pro'])) == 0 ){
            $mensaje = "Debe ingresar un nombre de proyecto. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['nombre_pro'])) < 5 ){
            $mensaje = "El nombre del proyecto debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
        }

        //Lugar
        elseif( intval(strlen($datos['lugar_pro'])) == 0 ){
            $mensaje = "Debe ingresar un lugar de proyecto. Vuelva a intentarlo";
        }
        elseif( intval(strlen($datos['lugar_pro'])) < 5 ){
            $mensaje = "El lugar de proyecto debe contener como mínimo 5 caracteres. Vuelva a intentarlo";
        }

        //Cantidad de Estudiantes
        elseif( intval($datos['participantes_pro']) == 0 ){
            $mensaje = "Debe ingresar como mínimo un participante de proyecto. Vuelva a intentarlo";
        }
        elseif( intval($datos['participantes_pro']) < 0 ){
            $mensaje = "Debe ingresar una cantidad de participantes positiva. Vuelva a intentarlo";
        }
        elseif( intval($datos['participantes_pro']) > 200 ){
            $mensaje = "La cantidad de participantes debe ser como máximo 200. Vuelva a intentarlo";
        }
        elseif(empty($datos['participantes_pro'])){
            $mensaje = "Debe ingresar una cantidad de participantes. Vuelva a intentarlo";
        }


        elseif(empty($facultades) and !empty($anios)){
            $mensaje = "Debe seleccionar mínimo una facultad. Vuelva a intentarlo";
        }
        elseif(!empty($facultades) and empty($anios)){
            $mensaje = "Debe seleccionar mínimo un año de estudio. Vuelva a intentarlo";
        }
        elseif(empty($facultades) and empty($anios)){
            $mensaje = "Se debe seleccionar mínimo un año de estudio y una año de facultad. Vuelva a intentarlo";
        }
        if( intval(strlen($datos['nombre_encarg'])) >= 5 and intval(strlen($datos['nombre_encarg'])) <= 80 and
            intval(strlen($datos['cedula'])) >= 9 and intval(strlen($datos['cedula'])) <= 20 and 
            intval(strlen($datos['telefono'])) >= 7 and intval(strlen($datos['telefono'])) <= 8 and
            intval(strlen($datos['correo'])) >= 11 and intval(strlen($datos['correo'])) >=30 and
            intval(strlen($datos['perfil_estu_pro'])) >= 5 and intval(strlen($datos['perfil_estu_pro'])) <= 250 and
            !empty($facultades) and !empty($anios) and
            intval(strlen($datos['nombre_pro'])) >= 5 and intval(strlen($datos['nombre_pro'])) <= 50 and
            intval(strlen($datos['lugar_pro'])) >= 5 and intval(strlen($datos['lugar_pro'])) <= 50


           /*AÑADIR LAS DEMÁS CONDICIONALES*/ ){
            $ingresar_datos = new  PropuestaController();
            $ingresar_datos->registrar_propuesta($datos,$facultades,$anios);

        }
        else{
            $_SESSION['mensaje_error'] = $mensaje;
            require_once $_SERVER['/var/www/html'] . 'Views/Layouts/registro_fallido.php';
        }
        
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
        $page = $_GET['Page'];
        require_once('./Controllers/UsuarioController.php');
        $controller = new UsuarioController();
        $controller->verPerfil($correo,$page);

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
        $imagen = $_GET['Imagen'];
        require_once('./Controllers/ProyectoController.php');

        $controller = new ProyectoController();
        $controller->proyecto($proyecto, $imagen);
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
        $motivo = $_POST['motivo-rechazo'];
        require_once('./Controllers/PropuestaController.php');
        $controller = new PropuestaController();
        $controller->rechazar_propuesta($id_propuesta, $motivo);
    }
    function inscribirse(){
        $id_proyecto = $_GET['Proyecto'];
        $correo = $_SESSION['usuario_actual'];
        $imagen = $_GET['Imagen'];
        require_once('./Controllers/UsuarioController.php');
        $usuario = new UsuarioController();
        $usuario->inscribirse($correo,$id_proyecto,$imagen);

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