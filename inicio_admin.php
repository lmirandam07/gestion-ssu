<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/inicio_admin.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>

<body>
    <?php include('./templates/header_usuario_admin.html'); ?>
    <main>
        <section class="hero has-bg-img is-large">
            <div class="hero-body">
            </div>
            <div class="has-bg-color">
                <h1 class="level-left is-size-2 has-text-weight-medium ml-4" >Bienvenido username - Administrador</h1>
            </div>
        </section>
        <section class="ssu-cont columns is-vcentered is-multiline">
            <div class="column is-offset-12 is-gapless"></div>
            <div class="column is-offset-12 is-gapless"></div>

            <div class="column is-12 has-text-centered">
                <h1 class="level-item has-text-weight-semibold is-size-3 is-purple" >Dirección de Servicio Social Universitario</h1>
            </div>
            <div class="column is-offset-12 is-gapless"></div>
        </section>
        <div class="columns is-gapless is-fluid">
            <div class="column is-half is-gapless container_morado level-item">
                    <div class="columns is-centered is-multiline">
                        <div class="column is-offset-12 is-gapless"></div>
                        <div class="column is-12 is-gapless">
                            <p class="has-text-centered is-size-3 has-text-weight-medium">Proyectos de SSU <br> Activos</p>
                        </div>
                        <div class="column is-12 is-gapless">
                            <p class="has-text-centered is-size-1 has-text-weight-light">0</p>
                        </div class="has-text-centered">
                        <div class="column is-12 is-gapless  is-centered">
                            <p class="has-text-centered is-size-5 level-item has-text-weight-medium"><span>Ver Proyectos</span><span class="icon"><i class="fas fa-chevron-right"></i></i></span></p>
                        </div class="has-text-centered">
                        <div class="column is-offset-12 is-gapless"></div>
                    </div>
            </div>
            <div class="column is-half is-gapless container_darkgray level-item">
                    <div class="columns is-centered is-multiline">
                        <div class="column is-offset-12 is-gapless"></div>
                        <div class="column is-12 is-gapless">
                            <p class="has-text-centered is-size-3 has-text-weight-medium">Nuevas Propuestas<br>de Proyectos</p>
                        </div>
                        <div class="column is-12 is-gapless">
                            <p class="has-text-centered is-size-1 has-text-weight-light">0</p>
                        </div class="has-text-centered">
                        <div class="column is-12 is-gapless  is-centered">
                            <p class="has-text-centered is-size-5 level-item has-text-weight-medium"><span>Ver Propuestas</span><span class="icon"><i class="fas fa-chevron-right"></i></i></span></p>
                        </div class="has-text-centered">
                        <div class="column is-offset-12 is-gapless"></div>
                    </div>
            </div>
    </div>
    </main>

    <?php include('./templates/footer.html'); ?>
</body>

</html>