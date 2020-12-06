<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/ver_proyectos_propuestas.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Ver Propuestas de Proyecto</title>
</head>

<body>
    <?php include('./Views/Layouts/header_usuario_admin.html'); //Al ser una página accedida únicamente por administradores, siempre se muestra este header. 
    ?>

    <br>

    <section class="container is-fluid">
        <!--Container del hero banner-->
        <div class="columns">
            <div class="column"></div>
            <div class="column is-11">
                <section class="hero has-bg-img is-medium">
                    <div class="hero-body"></div>
                    <div class="hero-foot">
                        <div class="container is-fluid">
                            <h1 class="title has-text-white" id="titulo_pagina">
                                Propuestas de Proyectos <br> de Servicio Social Universitario
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
    if ($cantidad != 0) { //En caso de que exista algún proyecto dentro de la base de datos, se mostrarán las propuestas mediante una paginación.
    ?>

        <section class="container is-fluid" id="propuestas">

            <?php
            //Al usar un foreach se consigue mostrar un nuevo contenedor de propuestas para cada uno de las propuestas que existen en la base de datos.
            foreach ($datos as $dato) { //Arreglo resultante del query en la base de datos. Nos retorna la información de las propuestas.
                $imagenes = array();
                //Arreglo de imagenes aleatorias para los proyectos.
                $imagenes = ['./img/foto_rand_1.svg', './img/foto_rand_2.svg', './img/foto_rand_3.svg', './img/foto_rand_4.svg'];
                $random = rand(0, 3);
            ?>

                <div class="columns is-centered">
                    <!--Propuesta-->
                    <div class="column is-11">
                        <div class="box">
                            <article class="media">
                                <div class="media-left"></div>
                                <div class="media-content" id="descrip">
                                    <div class="content">
                                        <div class="columns is-gapless is-fluid is-multiline is-centered">
                                            <div class="column is-gapless is-narrow">
                                                <figure class="image is-fluid is-peque">
                                                    <img id="foto_proyecto" src=" <?php echo $imagenes[$random]; /*echo './img/voluntario_rand_1_try.jpg';*/ ?> " alt="Image">
                                                </figure>
                                            </div>
                                            <div class="column is-8 is-gapless">
                                                <h3 id="titulo"> <?php echo $dato['nombre_pro'] //Se obtiene el nombre de la propuesta del arreglo resultante del query  ?> </h3>
                                                <p name="inicio" value="<?php $inicio ?>">
                                                    <?php echo $dato['descripcion_pro'] //Se obtiene el nombre de la propuesta del arreglo resultante del query ?><br>
                                                </p>
                                            </div>
                                            <div class="column is-gapless"></div>
                                            <div class="column is-11 is-gapless"></div>
                                            <div class="column is-narrow is-gapless has-text-centered">
                                                <?php
                                                $propuesta = $dato['id_propuesta'];
                                                //Se manda como argumentos tanto el nombre del controller correspondiente y el id de la propuesta.
                                                //Esto se hace para poder mostrar la información de la propuesta correspondiente en la pantalla de propuesta_proyecto.php
                                                echo "<a href='../../route.php?controller=Acceder&Propuesta=" . $propuesta . "' class='button is-dark is-hovered' id='boton'>Ver más</a>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <!--Final Propuesta-->

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

                            for ($i = 1; $i <= $paginas; $i++) { //For con el que se muestran los botones de la paginación.


                            ?>
                                <li>
                                <?php
                                if ($i != $active) { //Las demás páginas se muestran del mismo color.
                                    echo "<a href='../../route.php?controller=Ver_Propuestas&Page=" . $i . "' class='pagination-link has-background-oscuro' id='paginas'>$i</a>";
                                } elseif ($i == $active) { //La página que se encuentra "activa" se muestra con un color diferente a las demás para dar feedback al usuario.
                                    echo "<a href='../../route.php?controller=Ver_Propuestas&Page=" . $i . "' class='pagination-link has-background-purpura' id='paginas'>$i</a>";
                                }
                            }
                                ?>
                                </li>


                        </ul>
                    </nav>
                </div>
            </div>
        </section>

    <?php } else { //En caso de no encontrarse un proyecto en la base de datos, se muestra un mensaje indicando al usuario que no hay ninguna propuesta registrada momentaneamente.
    ?>

        <section class="container is-fluid">
            <div class="columns is-centered">
                <div class="column is-11">
                    <article class="message is-medium">
                        <div class="message-body">
                            <strong class="has-text-purpura"> ¡Excelente! </strong><br> No hay ninguna propuesta pendiente por evaluación en el sistema. ¡Sigue así!
                        </div>
                    </article>
                </div>
            </div>
        </section>

    <?php }
    ?>

    <br>
    <?php include('./Views/Layouts/footer_admin.html'); //Al ser una página accedida únicamente por administradores, siempre se muestra este footer. 
    ?>
</body>

</html>