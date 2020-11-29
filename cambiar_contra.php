<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header2_2.css">
    <link rel="stylesheet" href="css/cambiar_cont2.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Cambiar Contraseña</title>
</head>

<body>
    <?php include('./templates/header2.html'); ?>

    <div class="hero is-fullheight">
        <div class="hero-body ">
            <div class="container has-text-centered">
                <div class="column is-10 is-offset-1">


<div class="box">
<h3 class="title titulo">Cambiar Contraseña</h3>

  <form action="" method="POST">
  <div class="field">
    <div class="control">
    <label class="label has-text-left">Nueva Contraseña</label>
      <input class="input is-medium input-is" type="text" name="Contra" autofocus="">
      <br>
    </div>
  </div>
  <div class="field">
    <div class="control">
    <label class="label has-text-left label1">Reescribir Contraseña</label>
      <input class="input is-medium input-is" type="text" name="Nueva_Contraseña">
    </div>
  </div>
  <input class="button boton" type="submit" value="Cambiar Contraseña">
</form>

</div>

                </div>
            </div>

        </div>

    </div>






</body>

</html>