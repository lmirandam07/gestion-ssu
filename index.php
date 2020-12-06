<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>

<body>
<?php include('./Views/Layouts/header.html'); ?>
    <main>
        <section class="hero has-bg-img is-large">
            <div class="hero-body"></div>
        </section>
        <section class="ssu-cont columns is-vcentered">
            <div class="column is-6 is-offset-3 has-text-centered">
                <p>
                    <span class="ssu">La Dirección de Servicio Social Universitario (SSU)</span>
                    es la unidad encargada del desarrollo de los proyectos de
                    servicio social y voluntariado, a nivel nacional.
                </p>
            </div>
        </section>
        <section class="mision-vision columns">
            <div class="mision column is-6 is-flex is-flex-direction-column is-justify-content-center is-align-items-center has-text-centered">
                <h3 class="title">Misión</h3>
                <p>
                    Sensibilizar y motivar al estudiante de la Universidad Tecnológica
                    de Panamá hacia una participación activa en beneficio de las poblaciones
                    vulnerables del país, a través del servicio social universitario y el
                    voluntariado.
                </p>
            </div>
            <div class="vision column is-6 is-flex is-flex-direction-column is-justify-content-center is-align-items-center has-text-centered">
                <h3 class="title">Visión</h3>
                <p>
                    Ofrecer soluciones mediante la aplicación de los conocimientos científicos, tecnológicos
                    y humanístios de los estudiantes de la Universidad Tecnológica de Panamá, a diversos problemas
                    de la sociedad
                </p>
            </div>
        </section>
        <section class="container objetivos ">
            <div class="content">
                <h3>Objetivos</h3>
                <ul>
                    <li>Desarrollar una conciencia de responsabilidad social que fomente en los estudiantes
                        la solidaridad, ética, la participaciión ciudadana, la empatía y el compromiso social</li>
                    <li> Contribuir al desarrollo tecnológico, económico y social del Estado, a través de la
                        ejecución de proyectos de servicio social universitario y voluntariado, para satisfacer
                        necesidades de grupos vulnerables o necesidades apremiantes de la comunidad.
                    </li>
                    <li> Establecer una relación entre la Universidad y las comunidades como binomio impulsador de
                        desarrollo social y cultural.</li>
                </ul>
            </div>
        </section>
        <section class="opciones has-text-centered">
            <div class="column is-6 is-offset-3 has-text-centered">
                <h3 class="title">¿Quieres ser parte de este equipo?</h3>
                <p>Si eres un estudiante de la Universidad Tecnológica de Panamá y deseas participar en un proyecto
                    de Servicio Social Universitario, inscríbete como <span>voluntario</span>. Por otro lado, si desea
                    proponer un proyecto ingrese los datos solicitados para su aprobación.
                </p>

                <div class="opc is-flex is-justify-content-space-evenly is-align-items-center has-text-centered">
                    <a class="voluntario" href="./Views/General/registrar.php">Voluntario</a>
                    <a class="proponer" href="./Views/General/registrar_propuesta.php">Proponer</a>
                </div>
            </div>
        </section>
    </main>

    <?php include('./Views/Layouts/footer.html'); ?>
</body>

</html>