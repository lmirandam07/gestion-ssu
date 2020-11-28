<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header2.css">
    <link rel="stylesheet" href="css/cambiarcont.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Cambiar Contraseña</title>
</head>

<body>
    <?php include('./templates/header2.html'); ?>

    <div class="container is-fluid div-master">
        <h1 class="Titulo">Cambiar Contraseña</h1>
        <form action="localhost:8000/">
            <div class="field">
                <label class="label">Nueva Contraseña</label>
                <div class="control level-item has-text-centered">
                    <input class="input input-is" type="text" placeholder="Text input" name="Correo">
                </div>
            </div>
            <br>
            <div class="field">
                <label class="label">Reescribir Contraseña</label>
                <div class="control level-item has-text-centered">
                    <input class="input input-is" type="text" placeholder="Text input" name="Correo">
                </div>
            </div>
            <div class="level-item has-text-centered div-boton">
                <input class="button boton" type="submit" value="Cambiar Contraseña">
            </div>
        </form>
    </div>
</body>

</html>