<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/proyecto.css">
    <title>Proyecto</title>
</head>

<body>
    <?php
    try { //Try catch implementado para mostrar el header correspondiente al tipo de usuario que accede a la pantalla.

        if ($_SESSION['tipo_usuario'] == 1) {
            include('./Views/Layouts/header_usuario.html'); //Header para estudiantes
        } else if ($_SESSION['tipo_usuario'] == 2) {
            include('./Views/Layouts/header_usuario_admin.html'); //Header para administradores
        } else {
            include('./Views/Layouts/header.html'); //Header para usuarios sin sesión
        }
    } catch (Exception $e) {
        echo 'Error encontrado: ', $e->getMessage(), "\n"; //Manejo de errores
    }

    ?>
    <?php
    $imagenes = ['./img/foto_rand_1.svg', './img/foto_rand_2.svg', './img/foto_rand_3.svg', './img/foto_rand_4.svg'];

    foreach ($datos as $dato) { //Arreglo resultante del query en la base de datos. Nos retorna la información del proyecto.
    ?>
        <div class="proyecto content">
            <!--Container que muestra la información del proyecto específico.-->
            <div class="titulo columns is-vcentered">
                <div class="imagen column is-one-third">
                    <img src="<?php echo $imagenes[$num_img]; ?>" alt="" width="350">
                </div>
                <div class="descripcion column">
                    <h1 class="is-large is-purple"><?php echo $dato['nombre_pro'] ?></h1>
                    <p><?php echo $dato['descripcion_pro'] ?></p>
                </div>
            </div>
            <div class="info1 columns">
                <div class="encargado column is-half">
                    <h1 class="subtitle is-purple">Encargado del Proyecto</h1>
                    <ul>
                        <li><strong>Nombre</strong>: <?php echo $dato['nombre_encarg'] ?></li>
                        <li><strong>Cédula</strong>: <?php echo $dato['cedula_encarg'] ?></li>
                        <li><strong>Teléfono</strong>: <?php echo $dato['telefono_encarg'] ?></li>
                        <li><strong>Correo</strong>: <?php echo $dato['correo_encarg'] ?></li>
                    </ul>
                </div>
                <div class="objetivo column">
                    <h1 class="subtitle is-purple">Objetivo</h1>
                    <p>
                        <?php echo $dato['objetivo_pro'] ?>
                    </p>
                </div>
            </div>

            <div class="info2 columns">
                <div class="perfil column is-half">
                    <h1 class="subtitle is-purple">Perfil de Estudiante</h1>
                    <p>
                        <?php echo $dato['perfil_estu_pro'] ?>
                    </p>
                <?php
            }
            foreach ($facultades as $facultad) { //Arreglo con los ids de las facultades del proyecto.
                $arr_facultad[$i] = $facultad['id_facultad'];
                $i++;
            }
                ?>
                <ul>
                    <li><strong>Facultades</strong>:
                        <ul>
                            <?php
                            if (in_array(1, $arr_facultad)) {
                                echo "<li> Ing. Civil </li>";
                            }
                            if (in_array(2, $arr_facultad)) {
                                echo "<li> Ing. Mecánica </li>";
                            }
                            if (in_array(3, $arr_facultad)) {
                                echo "<li> Ing. Eléctrica </li>";
                            }
                            if (in_array(4, $arr_facultad)) {
                                echo "<li> Ing. Sistemas Computacionales</li>";
                            }
                            if (in_array(5, $arr_facultad)) {
                                echo "<li> Ing. Industrial</li>";
                            }
                            if (in_array(6, $arr_facultad)) {
                                echo "<li> Ciencias y Tecnología</li>";
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    foreach ($anios as $anio) { //Arreglo con los ids de las años de estudios de los estudiantes del proyecto.
                        $arr_anios[$i] = $anio['id_ano'];
                        $i++;
                    }
                    ?>
                    <br>
                    <li><strong>Año de Estudio</strong>:
                        <ul>
                            <?php
                            if (in_array(1, $arr_anios)) {
                                echo "<li> 1er Año </li>";
                            }
                            if (in_array(2, $arr_anios)) {
                                echo "<li> 2do Año </li>";
                            }
                            if (in_array(3, $arr_anios)) {
                                echo "<li> 3er Año </li>";
                            }
                            if (in_array(4, $arr_anios)) {
                                echo "<li> 4to Año o más</li>";
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <?php
                foreach ($datos as $dato) {
                ?>
                </div>
                <div class="informacion column">
                    <h1 class="subtitle is-purple">Información</h1>
                    <ul>
                        <li><strong>Lugar</strong>: <?php echo $dato['lugar_pro'] ?></li>
                        <li><strong>Fecha</strong>: <?php echo $dato['fecha_pro'] ?></li>
                        <li><strong>Hora de Inicio</strong>: <?php echo $dato['hora_inicio_pro'] ?></li>
                        <li><strong>Hora de Fin</strong>: <?php echo $dato['hora_final_pro'] ?></li>
                        <li><strong>Cantidad de estudiantes requeridos</strong>: <?php echo $dato['participantes_pro'] ?></li>
                    </ul>
                </div>
            </div>


            <div class="inscribirse content has-text-centered">
                <?php
                    $id_proyecto = $dato['id_proyecto'];

                    try { //Try and catch con el que se controla el tipo de usuario y, en caso de ser estudiante, si este ya se inscribió en el proyecto específico.
                        if ($_SESSION['tipo_usuario'] == 1) {
                            if (($inscrito == False) and ($dato['participantes_pro'] > 0)) { //Si es un estudiante y no está inscrito se mostrará el botón de inscribirse habilitado.
                                echo "<a href='?controller=Inscribirse&Proyecto=" . $id_proyecto."&Imagen=" .$num_img. "' class='button is-principal is-medium is-outlined'>Inscribirse</a>";
                            } elseif (($inscrito == True) and ($dato['participantes_pro'] > 0)) { //Si es un estudiante y está inscrito se mostrará el botón de inscribirse deshabilitado y dirá "Inscrito".
                ?>
                            <button class='button is-medium is-cancelado' disabled>Inscrito</button>
                        <?php
                            } elseif ($dato['participantes_pro'] <= 0) { //Si la cantidad de estudiantes requeridos ya llegó a 0, se mostrará el botón deshabilitado y dirá "Proyecto Lleno".

                        ?>
                            <button class='button is-medium is-cancelado' disabled>Proyecto Lleno</button>
                <?php

                            }
                        }
                    } catch (Exception $e) { //Manejo de errores mediante excepciones.
                        echo 'Error encontrado: ', $e->getMessage(), "\n";
                    }

                ?>
            </div>
            <p></p>
        </div>
    <?php
                }
    ?>
    <?php
    try { //Try catch implementado para mostrar el footer correspondiente al tipo de usuario que accede a la pantalla.

        if ($_SESSION['tipo_usuario'] == 1) { //Footer para estudiantes
            include('./Views/Layouts/footer_estu.html');
        } else if ($_SESSION['tipo_usuario'] == 2) { //Footer para administradores
            include('./Views/Layouts/footer_admin.html');
        } else {
            include('./Views/Layouts/footer.html'); //Footer para usuarios sin sesión
        }
    } catch (Exception $e) {
        echo 'Error encontrado: ', $e->getMessage(), "\n"; //Manejo de errores
    }
    ?>
</body>

</html>