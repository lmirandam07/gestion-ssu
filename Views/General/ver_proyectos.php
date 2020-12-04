<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/ver_proyectos_propuestas.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Ver Proyecto</title>
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
    <br>
    <section class="container is-fluid">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-11">
                <section class="hero has-bg-img is-medium" id="banner_proyecto">
                    <div class="hero-body"></div>
                    <div class="hero-foot">
                        <div class="container is-fluid">
                            <h1 class="title has-text-white" id="titulo_pagina">
                                Proyectos de <br> Servicio Social Universitario
                            </h1>
                        </div>
                    </div>
                </section>
            </div>
            <div class="column"></div>
        </div>
    </section>
    <br>

    <?php
    if ($cantidad !=0) {
    ?>
        <section class="container is-fluid" id="propuestas">

            <?php
            foreach ($datos as $dato) {
                $imagenes = array();
                $imagenes = ['./img/voluntario_rand_1.jpg', './img/voluntario_rand_2.jpg', './img/voluntario_rand_3.jpg', './img/voluntario_rand_4.jpg'];
                $random = rand(0, 3);
            ?>

                <div class="columns is-centered">
                    <!--Proyecto-->
                    <div class="column is-11">
                        <div class="box">
                            <article class="media">
                                <div class="media-left"></div>
                                <div class="media-content" id="descrip">
                                    <div class="content">
                                        <div class="columns is-gapless is-fluid is-multiline is-centered">
                                            <div class="column is-gapless is-narrow">
                                                <figure class="image is-fluid">
                                                    <img id="foto_proyecto" src=" <?php /*echo $imagenes[$random];*/ echo './img/voluntario_rand_1_try.jpg'; ?> " alt="Image">
                                                </figure>
                                            </div>
                                            <div class="column is-8 is-gapless">
                                                <h3 id="titulo"> <?php echo $dato['nombre_pro'] ?> </h3>
                                                <p name="inicio" value="<?php $inicio ?>">
                                                    <?php echo $dato['descripcion_pro'] ?><br>
                                                </p>
                                            </div>
                                            <div class="column is-gapless"></div>
                                            <div class="column is-11 is-gapless"></div>
                                            <div class="column is-narrow is-gapless has-text-centered">
                                                <?php
                                                $proyecto = $dato['id_proyecto'];
                                                echo "<a href='../../route.php?controller=Proyecto&Proyecto=" . $proyecto . "' class='button is-dark is-hovered' id='boton'>Ver más</a>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <!--Final Proyecto-->

            <?php
            }
            ?>

        </section>

        <section class="container is-fluid">
            <div class="columns is-centered">
                <div class="column is-11">
                    <nav class="pagination">
                        <ul class="pagination-list">
                            <?php

                            for ($i = 1; $i <= $paginas; $i++) {


                            ?>
                                <li>
                                <?php
                                if ($i != $active) {
                                    echo "<a href='../../route.php?controller=Ver_Proyectos&Page=" . $i . "' class='pagination-link has-background-oscuro' id='paginas'>$i</a>";
                                } elseif ($i == $active) {
                                    echo "<a href='../../route.php?controller=Ver_Proyectos&Page=" . $i . "' class='pagination-link has-background-purpura' id='paginas'>$i</a>";
                                }
                            }
                                ?>
                                </li>


                        </ul>
                    </nav>
                </div>
            </div>
        </section>

    <?php } else {
    ?>

        <section class="container is-fluid">
            <div class="columns is-centered">
                <div class="column is-11">
                    <article class="message is-medium">
                        <div class="message-body">
                            <strong class="has-text-purpura"> Vaya... </strong><br> No hay ningún proyecto registrado en el sistema. Inténtalo más tarde.
                        </div>
                    </article>
                </div>
            </div>
        </section>

    <?php }
    ?>

    <br>
    <?php include('./Views/Layouts/footer.html'); ?>
</body>

</html>