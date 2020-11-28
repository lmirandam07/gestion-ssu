<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header2.css">
    <link rel="stylesheet" href="css/registrar.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Inicio</title>
</head>

<body>
    <?php include('./templates/header2.html'); ?>

    <div class="hero is-fullheight">
        <div class="hero-body ">
            <div class="container has-text-centered">
                <div class="column is-10 is-offset-1">


<div class="box">
<h3 class="title titulo">Formualario de Registro</h3>

  <form>
  <div class="columns">
                <div class="column columna1">
                    <div class="field">
                        <label class="label">Nombre</label>
                        <div class="control">
                            <input class="input input-is" type="text"name="Nombre">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Correo Institucional</label>
                        <div class="control">
                            <input class="input input-is" type="text" name="Correo">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Contraseña</label>
                        <div class="control">
                            <input class="input input-is" type="text" name="Contraseña">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Validar Contraseña</label>
                        <div class="control">
                            <input class="input input-is" type="text" name="ValidarC">
                        </div>
                    </div>




                </div>
                <div class="column columna2">
                    <div class="field">
                        <label class="label">Apellido</label>
                        <div class="control">
                            <input class="input input-is" type="text" name="Apellido">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label label-is">Cédula</label>
                        <div class="control">
                            <input class="input input-is" type="text" names="Cedula">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Número de Contacto</label>
                        <div class="control">
                            <input class="input input-is" type="text" name="Numero_Contacto">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Facultad</label>
                        <div class="control">
                            <div class="select is-fullwidth input-is">
                                <select name="Facultad">
                                    <option>F. Ing. Civil</option>
                                    <option>F. Ing. Eléctrica</option>
                                    <option>F. Ing. Industrial</option>
                                    <option>F. Ing. Mecánica</option>
                                    <option>F. Ciencias y Tecnología</option>
                                    <option>F. Ing. Sist. Computacionales</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <input class="button boton" type="submit" value="Registrarse">
</form>

<p class="level-item has-text-centered">¿Ya tienes una cuenta? <a class="link" href=""> Inicia Sesión</a></p>
</div>

                </div>
            </div>

        </div>

    </div>






</body>

</html>