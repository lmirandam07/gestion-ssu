<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/ver_perfil.css">
    <link rel="stylesheet" href="../../css/ver_proyectos.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <title>Ver Perfil</title>
</head>

<body>
<?php include('../Layouts/header_usuario.html'); ?>



        <div class="columns colprin">
            <div class="column is-two-fifths columna1 box ">
            <div class="icono-edit is-pulled-top"><i class="far fa-edit is-pulled-right"></i></div>
                <div class="content has-text-centered"><i class="far fa-user-circle fa-8x has-text-centered"></i></div>
                <?php foreach($datos as $dato){ ?>
                <h1 class="has-text-centered textoP"> <?php echo $dato["nombre_us"]. ' ' . $dato["apellido_us"] ?> </h1>
                <h3 class="has-text-centered texto">ESTUDIANTE</h3>
                <div class="columns ">
                    <div class="column is-half">


                        <H3 class="texto">CÉDULA</H3>
                        <H3 class="texto">FACULTAD</H3>
                        <H3 class="texto">CORREO ELECTRÓNICO</H3>
                        <H3 class="texto">TELÉFONO</H3>

                    </div>
                    <div class="column is-half ">


                        <h3 class="texto"><?php echo $dato["cedula_us"] ?></h3>
                        <h3 class="texto"><?php echo $dato["nombre_facultad"] ?></h3>
                        <h3 class="texto"><?php echo $dato["correo"] ?></h3>
                        <h3 class="texto"><?php echo $dato["telefono"] ?></h3>


                <?php } ?>



                    </div>


                </div>

            </div>
            <div class="column is-half bod box">
                <h1 class="has-text-centered reg">Registro de Horas</h1>
                <h3 class="has-text-right horas">Total: 20 horas</h3>
                <div class="columns columna-barra">
                    <div class="column is-one-third has-text-centered ">
                        <h3 class="textcol2">PROYECTO</h3>
                    </div>
                    <div class="column is-one-third has-text-centered">
                        <h3 class="textcol2">FECHA</h3>
                    </div>
                    <div class="column is-one-third has-text-centered">
                        <h3 class="textcol2">HORAS ACUMULADAS</h3>
                    </div>
                </div>



            </div>

        </div>


    <h1 class="pro-ins has-text-left">Proyectos Inscritos</h1>


    <section class="container is-fluid" id="proyectos">
        <div class="columns is-centered">
            <!--Proyecto-->
            <div class="column is-11">
                <div class="box">
                    <article class="media">
                        <div class="media-left">
                            <figure class="image is-128x128">
                                <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                            </figure>
                        </div>
                        <div class="media-content" id="descrip">
                            <div class="content">
                                <h3 id="titulo">Limpieza de playas</h3>
                                <div class="columns">
                                    <div class="column is-10">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur
                                            sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                        </p>
                                    </div>
                                </div>
                                <div class="columns is-variable is-8-desktop">
                                    <div class="column is-2 is-offset-10">
                                        <button class="button is-dark is-hovered"> Ver más </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <!--Final Proyecto-->
    </section>

    <section class="container is-fluid cont" id="proyectos">
        <div class="columns is-centered">
            <!--Proyecto-->
            <div class="column is-11">
                <div class="box">
                    <article class="media">
                        <div class="media-left">
                            <figure class="image is-128x128">
                                <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                            </figure>
                        </div>
                        <div class="media-content" id="descrip">
                            <div class="content">
                                <h3 id="titulo">Limpieza de playas</h3>
                                <div class="columns">
                                    <div class="column is-10">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur
                                            sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                        </p>
                                    </div>
                                </div>
                                <div class="columns is-variable is-8-desktop">
                                    <div class="column is-2 is-offset-10">
                                        <button class="button is-dark is-hovered"> Ver más </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <!--Final Proyecto-->
    </section>

    <?php include('../Layouts/footer.html'); ?>


</body>

</html>