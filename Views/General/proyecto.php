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
        try {

            if($_SESSION['tipo_usuario'] == 1) {
                include('./Views/Layouts/header_usuario.html');
            } else if ($_SESSION['tipo_usuario'] == 2) {
                include('./Views/Layouts/header_usuario_admin.html');
            } else {
                include('./Views/Layouts/header.html');
            }
        } catch (Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }

    ?>
    <?php
    foreach ($datos as $dato) {
    ?>
        <div class="proyecto content">
            <div class="titulo columns is-vcentered">
                <div class="imagen column is-one-third">
                    <img src="../../img/playa.png" alt="" width="350">
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
                    <ul>
                        <li><strong>Facultades</strong>: Sistemas Computacionales</li>
                        <li><strong>Año de Estudio</strong>: 3er y 4to año</li>
                    </ul>
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
                <button class="button is-principal is-medium is-outlined">Inscribirse</button>
            </div>

        </div>
    <?php
    }
    ?>
    <?php include('./Views/Layouts/footer.html'); ?>
</body>

</html>