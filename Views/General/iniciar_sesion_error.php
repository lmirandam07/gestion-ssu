<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header2.css">
    <link rel="stylesheet" href="../../css/iniciar_sesion.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Iniciar Sesión</title>
</head>

<body>
    <?php include('../Layouts/header2.html'); ?>
    <div class="hero is-fullheight">
        <div class="hero-body ">
            <div class="container has-text-centered">
                <div class="column is-10 is-offset-1">


                    <div class="box">
                        <h3 class="title titulo">Iniciar Sesión</h3>

                        <form action="../../route.php?controller=Inicio_Sesion" method="POST">
                            <div class="field">
                                <div class="control">
                                    <label class="label has-text-left">Correo Electrónico</label>
                                    <input class="input is-medium input-is" type="email" name="correo" autofocus="" required>
                                    <br>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label has-text-left label1">Contraseña</label>
                                    <input class="input is-medium input-is" type="password" name="contrasena" required>
                                </div>
                            </div>
                            <input class="button boton" type="submit" value="Iniciar Sesión">
                        </form>

                        <p class="sent">¿Haz olvidado la contraseña?<a class="link" href="http://localhost:8000/cambiar_contra.php">Haz clic aquí</a></p>

                        <br>

                        <p class="sent">¿No tienes una cuenta?<a class="link" href="http://localhost:8000/registrar.php">Registrate</a></p>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Error</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                Correo o contraseña inválidos, por favor verifique los campos
            </section>
            <footer class="modal-card-foot">
                <button class="button boton"><a class="boton" href="./iniciar_sesion.php">Regresar</a></button>
            </footer>
        </div>
    </div>

</body>

</html>