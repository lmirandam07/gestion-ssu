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


            <table class="table is-fullwidth">
                <tbody>
                    <tr>
                    <td><H3 class="texto">CÉDULA</H3></td>
                    <td><h3 class="texto"><?php echo $dato["cedula_us"] ;?></h3></td>
                    </tr>
                    <tr>
                    <td><H3 class="texto">FACULTAD</H3></td>
                    <td><h3 class="texto"><?php echo $dato["nombre_facultad"] ;?></h3></td>
                    </tr>
                    <tr>
                    <td><H3 class="texto">CORREO ELECTRÓNICO</H3></td>
                    <td><h3 class="texto"><?php echo $dato["correo"] ;?></h3></td>
                    </tr>
                    <tr>
                    <td><H3 class="texto">TELÉFONO</H3></td>
                    <td><h3 class="texto"><?php echo $dato["telefono"] ;?></h3></td>
                    </tr>
                
                   
                    
                </tbody>
            </table>

                <!--<div class="column is-half">


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





                </div> -->


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
                                                <h3 id="titulo"> <?php echo $total['nombre_pro'] ?> </h3>
                                                <p name="inicio" value="<?php $inicio ?>">
                                                    <?php echo $total['descripcion_pro'] ?><br>
                                                </p>
                                            </div>
                                            <div class="column is-gapless"></div>
                                            <div class="column is-11 is-gapless"></div>
                                            <div class="column is-narrow is-gapless has-text-centered">
                                                <?php
                                                $proyecto = $total['id_proyecto'];
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