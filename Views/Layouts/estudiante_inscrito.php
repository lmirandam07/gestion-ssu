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

        $imagenes = ['./img/foto_rand_1.svg', './img/foto_rand_2.svg', './img/foto_rand_3.svg', './img/foto_rand_4.svg'];

    ?>

    <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-card has-text-centered">
                <header class="modal-card-head">
                    <p class="modal-card-title">¡Estudiante Inscrito!</p>
                    
                </header>
                <section class="modal-card-body">
                    <p class="medium">Te has inscrito exitosamente en este proyecto.</p>
                </section>
                <footer class="modal-card-foot columns">
                    <div class="column"></div>
                    <div class="column is-two-fifths">
                        <a href="?controller=Ver_Proyectos&Page=1"><button class="button is-principal">Ok</button></a>
                    </div>
                    <div class="column"></div>
                    
                </footer>
            </div>
    </div>

        <div class="proyecto content">
            <div class="titulo columns is-vcentered">
                <div class="imagen column is-one-third">
                    <img src="<?php echo $imagenes[$num_img]; ?>" alt="" width="350">
                </div>
                <div class="descripcion column">
                    <h1 class="is-large is-purple"></h1>
                    <p></p>
                </div>
            </div>
            <div class="info1 columns">
                <div class="encargado column is-half">
                    <h1 class="subtitle is-purple">Encargado del Proyecto</h1>
                    <ul>
                        <li><strong>Nombre</strong>: </li>
                        <li><strong>Cédula</strong>: </li>
                        <li><strong>Teléfono</strong>:</li>
                        <li><strong>Correo</strong>: </li>
                    </ul>
                </div>
                <div class="objetivo column">
                    <h1 class="subtitle is-purple">Objetivo</h1>
                    <p>
                    </p>
                </div>
            </div>

            <div class="info2 columns">
                <div class="perfil column is-half">
                    <h1 class="subtitle is-purple">Perfil de Estudiante</h1>
                    <p>
                    </p>
                <ul>
                    <li><strong>Facultades</strong>:
                        <ul>
                        </ul>
                    </li>
                    <br>
                    <li><strong>Año de Estudio</strong>:
                        <ul>
                        </ul>
                    </li>
                </ul>
                </div>
                <div class="informacion column">
                    <h1 class="subtitle is-purple">Información</h1>
                    <ul>
                        <li><strong>Lugar</strong>: </li>
                        <li><strong>Fecha</strong>:</li>
                        <li><strong>Hora de Inicio</strong>: </li>
                        <li><strong>Hora de Fin</strong>: </li>
                        <li><strong>Cantidad de estudiantes requeridos</strong>: </li>
                    </ul>
                </div>
            </div>
            <div class="inscribirse content has-text-centered">
               
            </div>

        </div>
        <?php
        try {

            if($_SESSION['tipo_usuario'] == 1) {
                include('./Views/Layouts/footer_estu.html');
            } else if ($_SESSION['tipo_usuario'] == 2) {
                include('./Views/Layouts/footer_admin.html');
            } else {
                include('./Views/Layouts/footer.html');
            }
        } catch (Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }
    ?>
</body>

</html>