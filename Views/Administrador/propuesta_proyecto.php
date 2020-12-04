<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/propuesta_proyecto.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <title>Propuesta</title>
</head>

<body>
    <?php include('./Views/Layouts/header_usuario_admin.html'); ?>
    <br>
    <section class="container is-fluid">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-11">
                <section class="hero has-bg-img is-medium">
                    <div class="hero-body"></div>
                    <div class="hero-foot">
                        <div class="container is-fluid">
                            <h1 class="title has-text-white">
                                Tu propio Proyecto de SSU
                            </h1>
                        </div>
                    </div>
                </section>
            </div>
            <div class="column"></div>
        </div>
    </section>

    <!--Formulario para la obtencion de los datos de la propuesta -->
    <section class="container is-fluid">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-11">
                <div class="propuesta content" id="propuesta">
                    <?php
                        foreach($datos as $dato){

                        
                    
                    ?>
                    <form action="" method="POST" id="informacion_propuesta">
                        <div class="columns">
                            <div class="datos column is-half">
                                <h2>Información Personal</h2>

                                <ul>
                                    <li><strong>Nombre Completo:</strong> <?php echo $dato['nombre_encarg']; ?></li>
                                    <br>
                                    <li><strong>Cédula:</strong> <?php echo $dato['cedula_encarg']; ?></strong></li>
                                    <br>
                                    <li><strong>Teléfono celular:</strong> <?php echo $dato['telefono_encarg']; ?></li>
                                    <br>
                                    <li><strong>Correo Electrónico:</strong> <?php echo $dato['correo_encarg']; ?></li>


                                </ul>




                                <br>
                                <br>
                                <fieldset id="datos_estudiante">
                                    <h2>Estudiantes</h2>
                                    <ul>
                                        <li><strong>Perfil de Estudiante: </strong></li>
                                            <p>
                                                <?php echo $dato['perfil_estu_pro']; ?>
                                            </p>
                                        <br>
                                        <br>
                                        <li><label for=""><strong>Año de Estudio:</strong></label></li>
                                        <br>
                                        <div class="columns ano_estudio">
                                            <div class="column is-one-third">

                                                <input type="checkbox" name="anio_list[]" id="periodo" value="primer">
                                                <label for="primero"><strong>Primer Año</strong></label>
                                                <br>
                                                <input type="checkbox" name="anio_list[]" id="periodo" value="tercero">
                                                <label for="tercero"><strong>Tercer Año</strong></label>

                                            </div>
                                            <div class="column">
                                                <input type="checkbox" name="anio_list[]" id="periodo" value="segundo">
                                                <label for="segundo"><strong>Segundo Año</strong></label>
                                                <br>
                                                <input type="checkbox" name="anio_list[]" id="periodo" value="cuarto">
                                                <label for="cuarto"><strong>Cuarto Año</strong></label>
                                            </div>

                                        </div>

                                        <br>
                                        <li><label for="facultad"><strong>Facultades: </strong></label></li>
                                        <br>
                                        <div class="columns facultades">
                                            <div class="column is-one-third">
                                                <input type="checkbox" name="facultad_list[]" id="facultad" value="civil">
                                                <label for="civil"><strong>F. Ing. Civil</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad_list[]" id="facultad" value="industrial">
                                                <label for="industrial"><strong>F. Ing. Industrial</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad_list[]" id="facultad" value="mecanica">
                                                <label for="mecanica"><strong>F. Ing. Mecánica</strong></label>
                                            </div>
                                            <div class="column">
                                                <input type="checkbox" name="facultad_list[]" id="facultad" value="electrica">
                                                <label for="electrica"><strong>F. Ing. Eléctrica</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad_list[]" id="facultad" value="ciencias">
                                                <label for="cuarto"><strong>F. Ing. Ciencias y Tecnología</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad_list[]" id="facultad" value="sistema">
                                                <label for="sistema"><strong>F. Ing. Sistemas Computacionales</strong></label>
                                            </div>

                                        </div>



                                    </ul>

                                </fieldset>





                            </div>
                            <div class="column">
                                <h2>Tu Proyecto</h2>
                                <ul>                                   
                                    <li><strong>Nombre:</strong> <?php echo $dato['nombre_pro']; ?></li>
                                    <br>
                                    <li><strong>Lugar:</strong> <?php echo $dato['lugar_pro']; ?></li>
                                    <br>
                                    <li><strong>Fecha:</strong> <?php echo $dato['fecha_pro']; ?></li>
                                    <br>
                                    <li><strong>Hora Inicio:</strong> <?php echo $dato['hora_inicio_pro']; ?></li>
                                    <br>
                                    <li><strong>Hora Final:</strong> <?php echo $dato['hora_final_pro']; ?></li>
                                    <br>
                                    <li><strong>Cantidad de Estudiantes:</strong> <?php echo $dato['participantes_pro']; ?></li>
                                    <br>
                                    <li><strong>Descripción</strong></li>
                                    <p>
                                        <?php echo $dato['descripcion_pro']; ?>
                                    </p>
                                    <br>
                                    <br>
                                    <li><strong>Objetivo</strong></li>
                                    <p>
                                        <?php echo $dato['objetivo_pro']; ?>
                                    </p>
                                    <br>
                                    <br>
                                    <li><strong>Materiales</strong></li>
                                    <p>
                                        <?php echo $dato['materiales_pro']; ?>
                                    </p>

                                </ul>



                            </div>
                        </div>
                        <br>
                        <div class="field is-grouped is-grouped-centered">
                            <p class="control">
                                <input type="submit" class="button is-second is-normal" value="RECHAZAR">
                            </p>
                            <p class="control">
                                <input type="submit" class="button is-principal is-normal" value="APROBAR">
                            </p>
                        </div>
                    </form>
                    <?php 
                        }
                    ?>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </section>

    <?php include('./Views/Layouts/footer_admin.html'); ?>
</body>

</html>