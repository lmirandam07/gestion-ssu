<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/registrar_propuesta.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <title>Registrar Propuesta</title>
</head>

<body>

    <?php include('./Views/Layouts/header.html'); ?>
    <br>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card has-text-centered">
            <header class="modal-card-head">
                <p class="modal-card-title">Registro de Propuesta Exitoso</p>

            </header>
            <section class="modal-card-body">
                <p class="medium">La propuesta se ha guardado exitosamente</p>
            </section>
            <footer class="modal-card-foot columns">
                <div class="column"></div>
                <div class="column is-two-fifths">
                    <a href="../index.php"><button class="button is-principal">Ok</button></a>
                </div>
                <div class="column"></div>

            </footer>
        </div>
    </div>
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
                    <form action="../../route.php?controller=Propuesta" method="POST" id="informacion_propuesta">
                        <div class="columns">
                            <div class="datos column is-half">
                                <h2>Información Personal</h2>

                                <ul>

                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Nombre Completo: </label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="text" placeholder="Juan Pérez" minlength="6" maxlength="80" name="nombre_encargado" id="nombre_encargado" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Cédula: </label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="text" placeholder="8-203-1490" minlength="6" maxlength="20" name="cedula" id="cedula" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Teléfono Celular: </label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="number" name="telefono" minlength="7" maxlength="8" placeholder="68794320" id="telefono" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Correo Electrónico: </label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="email" placeholder="correo@utp.ac.pa" minlength="11" maxlength="50" name="correo" id="correo" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </ul>




                                <br>
                                <br>
                                <fieldset id="datos_estudiante">
                                    <h2>Estudiantes</h2>
                                    <ul>
                                        <li><label for="perfil"><strong>Perfil de Estudiante: </strong></label></li>
                                        <br>
                                        <textarea class="textarea is-small" name="perfil" id="perfil" minlength="5" maxlength="250" required></textarea>
                                        <br>
                                        <br>
                                        <li><label for=""><strong>Año de Estudio:</strong></label></li>
                                        <br>
                                        <div class="columns ano_estudio">
                                            <div class="column is-one-third">

                                                <input type="checkbox" name="anio[]" id="periodo" value="1">
                                                <label for="primero"><strong>Primer Año</strong></label>
                                                <br>
                                                <input type="checkbox" name="anio[]" id="periodo" value="3">
                                                <label for="tercero"><strong>Tercer Año</strong></label>

                                            </div>
                                            <div class="column">
                                                <input type="checkbox" name="anio[]" id="periodo" value="2">
                                                <label for="segundo"><strong>Segundo Año</strong></label>
                                                <br>
                                                <input type="checkbox" name="anio[]" id="periodo" value="4">
                                                <label for="cuarto"><strong>Cuarto Año o más</strong></label>
                                            </div>

                                        </div>

                                        <br>
                                        <li><label for="facultad"><strong>Facultades: </strong></label></li>
                                        <br>
                                        <div class="columns facultades">
                                            <div class="column is-one-third">
                                                <input type="checkbox" name="facultad[]" id="facultad" value="1">
                                                <label for="civil"><strong>F. Ing. Civil</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad[]" id="facultad" value="5">
                                                <label for="industrial"><strong>F. Ing. Industrial</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad[]" id="facultad" value="2">
                                                <label for="mecanica"><strong>F. Ing. Mecánica</strong></label>
                                            </div>
                                            <div class="column">
                                                <input type="checkbox" name="facultad[]" id="facultad" value="3">
                                                <label for="electrica"><strong>F. Ing. Eléctrica</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad[]" id="facultad" value="6">
                                                <label for="cuarto"><strong>F. Ing. Ciencias y Tecnología</strong></label>
                                                <br>
                                                <input type="checkbox" name="facultad[]" id="facultad" value="4">
                                                <label for="sistema"><strong>F. Ing. Sistemas Computacionales</strong></label>
                                            </div>

                                        </div>



                                    </ul>

                                </fieldset>





                            </div>
                            <div class="column">
                                <h2>Tu Proyecto</h2>
                                <ul>

                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small" for="nombre_proyecto">Nombre:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="text" placeholder="Limpieza de Playa" minlength="5" maxlength="50" name="nombre_proyecto" id="nombre_proyecto" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label for="lugar" class="label is-small">Lugar:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="text" placeholder="Cinta Costera" minlength="5" maxlength="50" name="lugar" id="lugar" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label for="fecha" class="label is-small">Fecha:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="date" placeholder="" name="fecha" id="fecha" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label for="hora_inicio" class="label is">Hora Inicio:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="time" min="04:00" max="21:00" name="hora_inicio" id="hora_inicio" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label for="hora_final" class="label is-small">Hora Final:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="time" min="05:00" max="22:00" name="hora_final" id="hora_final" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label for="cantidad" class="label">Cantidad de Estudiantes: </label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="number" placeholder="20" min="1" max="200" name="cantidad" id="cantidad" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <li><label for="descripcion" class="label">Descripción</label></li>
                                    <textarea class="textarea is-small" name="descripcion" id="descripcion" minlength="5" maxlength="250" required></textarea>
                                    <br>
                                    <br>
                                    <li><label for="objetivo" class="label">Objetivo</label></li>
                                    <textarea class="textarea is-small" name="objetivo" id="objetivo" minlength="5" maxlength="250" required></textarea>
                                    <br>
                                    <br>
                                    <li><label for="materiales" class="label">Materiales</label></li>
                                    <textarea class="textarea is-small" name="materiales" id="materiales" minlength="5" maxlength="250" required></textarea>


                                </ul>



                            </div>
                        </div>
                        <br>
                        <div class="field is-grouped is-grouped-centered">
                            <p class="control">
                                <a href="../../index.php"><button type="button" class="button is-second is-normal">CANCELAR</button></a>
                            </p>
                            <p class="control">
                                <input type="submit" class="button is-principal is-normal" value="ENVIAR">
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </section>

    <?php include('./Views/Layouts/footer.html'); ?>
</body>

</html>