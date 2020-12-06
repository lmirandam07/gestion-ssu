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
    <title>Listado de Proyectos</title>
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
    <br>
    <section class="container is-fluid">
        <!--Container del hero banner-->
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
    if ($cantidad != 0) { //En caso de que exista algún proyecto dentro de la base de datos, se mostrarán los proyectos mediante una paginación.
    ?>
        <section class="container is-fluid" id="propuestas">

            <?php
            //Al usar un foreach se consigue mostrar un nuevo contenedor de proyectos para cada uno de los proyectos que existen en la base de datos.
            foreach ($datos as $dato) { //Arreglo resultante del query en la base de datos. Nos retorna la información de los proyectos.
                $imagenes = array();
                //Arreglo de imagenes aleatorias para los proyectos.
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
                                                <h3 id="titulo"> <?php echo $dato['nombre_pro'] //Se obtiene el nombre del proyecto del arreglo resultante del query 
                                                                    ?> </h3>
                                                <p name="inicio" value="<?php $inicio ?>">
                                                    <?php echo $dato['descripcion_pro'] //Se obtiene el nombre del proyecto del arreglo resultante del query
                                                    ?><br>
                                                </p>
                                            </div>
                                            <div class="column is-gapless"></div>
                                            <div class="column is-11 is-gapless"></div>
                                            <div class="column is-narrow is-gapless has-text-centered">
                                                <?php
                                                $proyecto = $dato['id_proyecto'];
                                                //Se manda como argumentos tanto el nombre del controller correspondiente y el id del proyecto.
                                                //Esto se hace para poder mostrar la información del proyecto correspondiente en la pantalla de proyecto.php
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

                            for ($i = 1; $i <= $paginas; $i++) { //For con el que se muestran los botones de la paginación.


                            ?>
                                <li>
                                <?php
                                if ($i != $active) { //Las demás páginas se muestran del mismo color.
                                    echo "<a href='../../route.php?controller=Ver_Proyectos&Page=" . $i . "' class='pagination-link has-background-oscuro' id='paginas'>$i</a>";
                                } elseif ($i == $active) { //La página que se encuentra "activa" se muestra con un color diferente a las demás para dar feedback al usuario.
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

    <?php } else { //En caso de no encontrarse un proyecto en la base de datos, se muestra un mensaje indicando al usuario que no hay ningún proyecto registrado momentaneamente.
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
    <?php
    try { //Try catch implementado para mostrar el footer correspondiente al tipo de usuario que accede a la pantalla.

        if ($_SESSION['tipo_usuario'] == 1) {
            include('./Views/Layouts/footer_estu.html'); //Footer para estudiantes
        } else if ($_SESSION['tipo_usuario'] == 2) {
            include('./Views/Layouts/footer_admin.html'); //Footer para administradores
        } else {
            include('./Views/Layouts/footer.html'); //Footer para usuarios sin sesión
        }
    } catch (Exception $e) {
        echo 'Error encontrado: ', $e->getMessage(), "\n"; //Manejo de errores
    }
    ?>
</body>

</html>