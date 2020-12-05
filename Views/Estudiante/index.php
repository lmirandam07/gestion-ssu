<?php session_start(); ?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" />
    <link rel="stylesheet" href="../../css/header.css" />
    <link rel="stylesheet" href="../../css/inicio_estudiante.css" />
    <link rel="stylesheet" href="../../css/footer.css" />
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>

<body>
    <?php include('../Layouts/header_usuario.html');
    require_once $_SERVER['/var/www/html'].'../../Controllers/ContadorEstuController.php';
            $controller = new ContadorEstuController();
            $counthoras = $controller->contador_horas();
            $countproyectoI = $controller->contador_proyectoI($correo);
        ?>
    <main>
        <section class="hero has-bg-img is-large">
            <div class="hero-body">
            </div>
            <div class="has-bg-color">
                <h1 class="level-left is-size-2 has-text-weight-medium ml-4">Bienvenido <?php echo $_SESSION['nombre_usuario']; ?> - Estudiante</h1>
            </div>
        </section>
        <section class="ssu-cont columns is-vcentered is-multiline">
            <div class="column is-offset-12 is-gapless"></div>
            <div class="column is-offset-12 is-gapless"></div>

            <div class="column is-12 has-text-centered">
                <h1 class="level-item has-text-weight-semibold is-size-3 is-purple">Visualiza tu progreso</h1>
            </div>
            <div class="column is-offset-12 is-gapless"></div>
        </section>
        <div class="columns is-gapless is-fluid">
            <div class="column is-half is-gapless container_morado level-item">
                <div class="columns is-centered is-multiline">
                    <div class="column is-offset-12 is-gapless"></div>
                    <div class="column is-12 is-gapless">
                        <p class="has-text-centered is-size-3 has-text-weight-medium">Cantidad de horas acumuladas</p>
                    </div>
                    <div class="column is-12 is-gapless">
                        <p class="has-text-centered is-size-1 has-text-weight-light"><?php echo $counthoras ?></p>
                    </div class="has-text-centered">
                    <div class="column is-12 is-gapless  is-centered">
                        <p class="has-text-centered is-size-5 level-item has-text-weight-medium"><a href="../../route.php?controller=Ver_Perfil">Ver Horas</a> <span class="icon"><i class="fas fa-chevron-right"></i></i></span></p>
                    </div class="has-text-centered">
                    <div class="column is-offset-12 is-gapless"></div>
                </div>
            </div>
            <div class="column is-half is-gapless container_darkgray level-item">
                <div class="columns is-centered is-multiline">
                    <div class="column is-offset-12 is-gapless"></div>
                    <div class="column is-12 is-gapless">
                        <p class="has-text-centered is-size-3 has-text-weight-medium">Proyectos Inscritos</p>
                    </div>
                    <div class="column is-12 is-gapless">
                        <p class="has-text-centered is-size-1 has-text-weight-light"><?php echo $countproyectoI ?></p>
                    </div class="has-text-centered">
                    <div class="column is-12 is-gapless  is-centered">
                        <p class="has-text-centered is-size-5 level-item has-text-weight-medium"><a href="../../route.php?controller=Ver_Perfil">Ver Proyectos</a> <span class="icon"><i class="fas fa-chevron-right"></i></i></span></p>
                    </div class="has-text-centered">
                    <div class="column is-offset-12 is-gapless"></div>
                </div>
            </div>
        </div>
        <section class="opciones has-text-centered">
            <div class="column is-6 is-offset-3 has-text-centered">
                <p class="subtitle">
                    Lo único que necesitas para involucrarte es tiempo, energía y tu pasión por mejorar el mundo.
                </p>
                <div class="opc is-flex is-justify-content-space-evenly is-align-items-center has-text-centered">
                    <a class="proponer" href="../../route.php?controller=Ver_Proyectos&Page=1">Involucrate</a>
                </div>
            </div>
        </section>
    </main>

    <?php include('../Layouts/footer.html'); ?>
</body>

</html>