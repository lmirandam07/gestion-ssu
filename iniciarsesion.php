<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header2.css">
    <link rel="stylesheet" href="css/iniciarsesion.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Inicio</title>
</head>

<body>
    <?php include('./templates/header2.html'); ?>

    <div class="container is-fluid formulario ">
        <h1 class="titulo">Iniciar Sesión</h1>
        <br>
        <form action="localhost:8000/" method="POST">
            <div class="field">
                <label class="label">Correo Electronico</label>
                <div class="control level-item has-text-centered">
                    <input class="input input-is" type="text" placeholder="Text input">
                </div>
                <br>
            </div>

            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control level-item has-text-centered">
                    <input class="input is-success input-is" type="text" placeholder="Text input">
                </div>

                <br>

                <div class="level-item has-text-centered div-boton">
                    <input class="button boton" type="submit" value="Iniciar Sesión">
                </div>

            </div>

        </form>

        <p class="level-item has-text-centered">¿Haz olvidado la contraseña?  <a class="link" href=""> Haz clic aquí</a></p>

        <br>

        <p class="level-item has-text-centered">¿No tienes una cuenta?  <a class="link" href=""> Registrate</a></p>
    </div>

</body>

</html>