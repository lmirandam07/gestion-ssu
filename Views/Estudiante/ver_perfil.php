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

    <?php include('./Views/Layouts/header_usuario.html');?>





    <div class="columns colprin">
        <div class="column is-two-fifths columna1 box ">
            <div class="icono-edit is-pulled-top"><i class="far fa-edit is-pulled-right"></i></div>
            <div class="content has-text-centered"><i class="far fa-user-circle fa-8x has-text-centered"></i></div>
            <?php foreach ($datos as $dato){ ?>

            <h1 class="has-text-centered textoP"> <?php echo $dato['nombre_us']. ' ' . $dato["apellido_us"] ;?> </h1>
            <h3 class="has-text-centered texto">ESTUDIANTE</h3>
            <div class="columns ">

                <div class="column is-half">


                    <H3 class="texto">CÉDULA</H3>
                    <H3 class="texto">FACULTAD</H3>
                    <H3 class="texto">CORREO ELECTRÓNICO</H3>
                    <H3 class="texto">TELÉFONO</H3>

                </div>
                <div class="column is-half ">


                    <h3 class="texto"><?php echo $dato["cedula_us"] ;?></h3>
                    <h3 class="texto"><?php echo $dato["nombre_facultad"] ;?></h3>
                    <h3 class="texto"><?php echo $dato["correo"]; ?></h3>
                    <h3 class="texto"><?php echo $dato["telefono"]; ?></h3>





                </div>


            </div>
            <?php }?>
        </div>
        <?php if ($cantidad) {?>
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
            <?php foreach ($data as $horas){ ?>
                <tr class="has-text-centered">
                    
                    <th><?php echo $horas["nombre_pro"] ;?></th>
                    <th><?php echo $horas["fecha_pro"] ;?></th>
                    <th><?php echo $horas["horas_usuario"] ;?></th>

                    <?php }?>
                    
                </tr>
                <tr>
                    <th><h3 class="has-text-centered horas">TOTAL</h3></th>
                    <th></th>
                <th><h3 class="has-text-centered horas"><?php echo $horas["total_horas"] ?></h3></th>
                </tr>
                
            </tbody>
            </table>

            </div>         
        </div>

    </div>


    <h1 class="pro-ins has-text-left">Proyectos Inscritos</h1>

    <?php foreach ($usuario as $total){ ?>
    <section class="container is-fluid cont" id="proyectos">
        <div class="columns is-centered">
            <!--Proyecto-->

            <div class="column is-11">
                <div class="box">
                    <article class="media">
                        <div class="media-left">


                            <?php  $imagenes = array();
                            $imagenes = ['./img/voluntario_rand_1.jpg', './img/voluntario_rand_2.jpg', './img/voluntario_rand_3.jpg', './img/voluntario_rand_4.jpg'];
                            $random = rand ( 0 , 3 );?>

                            <figure class="image is-128x128">
                                <img src=" <?php /*echo $imagenes[$random];*/ echo './img/voluntario_rand_1_try.jpg'; ?> "
                                    alt="Image">
                            </figure>
                        </div>
                        <div class="media-content" id="descrip">
                            <div class="content">
                                <h3 id="titulo"><?php echo $total["nombre_pro"] ;?></h3>
                                <div class="columns">
                                    <div class="column is-10">
                                        <p>
                                            <?php echo $total["descripcion_pro"] ;?>
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
    <?php }?>

    <?php include('./Views/Layouts/footer.html'); ?>
    <?php } else {?>
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
    <tr><h3 class="has-text-right horas">Total: 0 Horas </h3></tr>
    
    
</tbody>

</table>
<h3 class="has-text-centered">Usted no se ha inscrito en ningun proyecto.</h3>
</div>         
</div>

</div>





<?php include('./Views/Layouts/footer.html'); ?>
        <?php }?>



</body>

</html>