<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header2.css">
    <link rel="stylesheet" href="../../css/registrar.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Inicio</title>
</head>

<body>
    <?php include('../Layouts/header2.html'); ?>
    <?php include('../../db/db.php'); ?>

    <?php


    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];
    $validarC = $_POST['validarC'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $numero_contacto = $_POST['numero_contacto'];
    $facultad = $_POST['facultad']; ?>


    <div class="hero is-fullheight">
        <div class="hero-body ">
            <div class="container has-text-centered">
                <div class="column is-10 is-offset-1">


                    <div class="box">
                        <h3 class="title titulo">Formulario de Registro</h3>

                        <form action="../../route.php?controller=Registrar" method="POST">
                            <div class="columns">
                                <div class="column columna1">
                                    <div class="field">
                                        <label for="nombre" class="label has-text-left">Nombre</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" id="nombre" name="nombre">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="email" class="label has-text-left">Correo Institucional</label>
                                        <div class="control">
                                            <input class="input input-is" type="email" id="email" name="correo">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="contraseña" class="label has-text-left">Contraseña</label>
                                        <div class="control">
                                            <input class="input input-is" id="contraseña" type="text" name="contra">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="validar_contraseña" class="label has-text-left">Validar Contraseña</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" id="validar_contraseña" name="validarC">
                                        </div>
                                    </div>



                                </div>
                                <div class="column columna2">
                                    <div class="field">
                                        <label for="apellido" class="label has-text-left">Apellido</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" id="apellido" name="apellido">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="cedula" class="label has-text-left ">Cédula</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" id="cedula" name="cedula">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="numero_contacto" class="label has-text-left">Número de Contacto</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" id="numero_contacto" name="numero_contacto">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="facultad" class="label has-text-left">Facultad</label>
                                        <div class="control">
                                            <div class="select is-fullwidth input-is">
                                                <select id="facultad" name="facultad">
                                                    <option value="1">F. Ing. Civil</option>
                                                    <option value="3">F. Ing. Eléctrica</option>
                                                    <option value="5">F. Ing. Industrial</option>
                                                    <option value="2">F. Ing. Mecánica</option>
                                                    <option value="6">F. Ciencias y Tecnología</option>
                                                    <option value="4">F. Ing. Sist. Computacionales</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <input data-message="Este es el boton de registrarse" class="button boton" type="submit" value="Registrarse">
                        </form>

                        <p class="sent">¿Ya tienes una cuenta? <a class="link" href="/Views/General/iniciar_sesion.php"> Inicia Sesión</a></p>
                    </div>

                </div>
            </div>

        </div>

    </div>






</body>

</html>