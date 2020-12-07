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

    <?php include('./Views/Layouts/header_usuario.html'); ?>



    <br>

    <div class="columns colprin">
        <div class="column is-two-fifths columna1 box ">
            <div class="content has-text-centered"><i class="far fa-user-circle fa-8x has-text-centered"></i></div>

            <?php
            //Arreglo resultante del query en la base de datos. Nos retorna la información del estudiante. 
            foreach ($datos as $dato) { ?>

                <h1 class="has-text-centered textoP"> <?php echo $dato['nombre_us'] . ' ' . $dato["apellido_us"]; ?> </h1>
                <h3 class="has-text-centered texto">ESTUDIANTE</h3>
                <div class="columns is-half">
                    <table class="table is-fullwidth">

                        <tbody>
                            <tr>
                                <td>
                                    <H3 class="texto">CÉDULA</H3>
                                </td>
                                <td>
                                    <h3 class="texto"><?php echo $dato["cedula_us"]; ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <H3 class="texto">FACULTAD</H3>
                                </td>
                                <td>
                                    <h3 class="texto"><?php echo $dato["nombre_facultad"]; ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <H3 class="texto">CORREO ELECTRÓNICO</H3>
                                </td>
                                <td>
                                    <h3 class="texto"><?php echo $dato["correo"]; ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <H3 class="texto">TELÉFONO</H3>
                                </td>
                                <td>
                                    <h3 class="texto"><?php echo $dato["telefono"]; ?></h3>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            <?php } ?>
        </div>
        <?php
        //Esta condicional sirve para saber si hay cero proyectos en lo cual el estudiante esta inscrito o si hay mas de uno 
        //dependiendo del resultado se muestra un container diferente, en este caso nos muestra cuando hay 1 o más proyectos.
        if ($cantidad) { ?>
            <div class="column is-half bod box">

                <h1 class="has-text-centered reg">Registro de Horas</h1>

                <div class="columns is-half">
                    <table class="table is-fullwidth is-fullheight tabla">
                        <thead>
                            <tr class="has-text-centered">
                                <th scope="row" class="textcol2 ">PROYECTO</th>
                                <th scope="row" class="textcol2">FECHA </th>
                                <th scope="row" class="textcol2">HORAS ACUMULADAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $horas) {
                                $id = $horas["id_proyecto"];
                                $nombre = $horas["nombre_pro"]; ?>

                                <tr class="has-text-centered">

                                    <th class="at"><?php echo $horas["nombre_pro"]; ?></th>
                                    <th><?php echo $horas["fecha_pro"]; ?></th>
                                    <th><?php echo $horas["horas_usuario"]; ?></th>

                                <?php } ?>

                                </tr>
                                <tr>
                                    <th>
                                        <h3 class="has-text-centered horas "><strong>TOTAL</strong></h3>
                                    </th>
                                    <th></th>
                                    <th>
                                        <h3 class="has-text-centered horas"><strong><?php echo $horas["total_horas"] ?></strong></h3>
                                    </th>
                                </tr>

                        </tbody>
                    </table>

                </div>

            </div>

    </div>
    <h2 class="pro-ins">Proyectos Inscritos</h2>
    <section class="container is-fluid" id="propuestas">
        

            <?php
            foreach ($usuario as $proyectos) {
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
                                                <h3 id="titulo"> <?php echo $proyectos['nombre_pro'] ?> </h3>
                                                <p name="inicio" value="<?php $inicio ?>">
                                                    <?php echo $proyectos['descripcion_pro'] ?><br>
                                                </p>
                                            </div>
                                            <div class="column is-gapless"></div>
                                            <div class="column is-11 is-gapless"></div>
                                            <div class="column is-narrow is-gapless has-text-centered">
                                                <?php
                                                $proyecto = $proyectos['id_proyecto'];
                                                echo "<a href='../../route.php?controller=Proyecto&Proyecto=" . $proyecto."&Imagen=" .$random. "' class='button is-dark is-hovered' id='boton' aria-label='Botón para mostrar los detalles del proyecto" .$proyectos['nombre_pro']. "'>Detalles</a>";
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
                                    echo "<a href='../../route.php?controller=Ver_Perfil&Page=" . $i . "' class='pagination-link has-background-oscuro' id='paginas'>$i</a>";
                                } elseif ($i == $active) {
                                    echo "<a href='../../route.php?controller=Ver_Perfil&Page=" . $i . "' class='pagination-link has-background-purpura' id='paginas'>$i</a>";
                                }
                            }
                                ?>
                                </li>


                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    




    <?php }
        //se muestra la pantalla que no tiene proyectos
        else {
    ?>
    <div class="column is-half bod box">

        <h1 class="has-text-centered reg">Registro de Horas</h1>

        <div class="table-container">
            <table class="table is-fullwidth is-scrollable">
                <thead>
                    <tr class="has-text-centered">
                        <th class="textcol2 ">PROYECTO</th>
                        <th class="textcol2">FECHA </th>
                        <th class="textcol2">HORAS ACUMULADAS</th>
                    </tr>
                </thead>

                <tbody>


                </tbody>

            </table>
            <h3 class="has-text-centered">Usted no se ha inscrito en ningun proyecto.</h3>
        </div>


        <?php } ?>


    </div>
        </div>
    
    <br>
    
    <?php
    //Se incluye el footer
    include('./Views/Layouts/footer.html'); ?>
</body>

</html>