
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
<?php include('./Views/Layouts/header2.html'); ?>
  


<div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-card has-text-centered">
      <header class="modal-card-head">
        <p class="modal-card-title">Registro de Usuario</p>
        
      </header>
      <section class="modal-card-body">
       <p class="medium">Se ha registrado correctamente</p>
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
  
<!--Formulario para la obtencion de los datos de la propuesta -->
   


    <div class="hero is-fullheight">
        <div class="hero-body ">
            <div class="container has-text-centered">
                <div class="column is-10 is-offset-1">


                    <div class="box">
                        <h3 class="title titulo">Formulario de Registro</h3>

                        <form action="" method="POST">
                            <div class="columns">
                                <div class="column columna1">
                                    <div class="field">
                                        <label class="label has-text-left">Nombre</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" name="nombre">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label has-text-left">Correo Institucional</label>
                                        <div class="control">
                                            <input class="input input-is" type="email" name="correo">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label has-text-left">Contraseña</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" name="contra">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label has-text-left">Validar Contraseña</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" name="validarC">
                                        </div>
                                    </div>




                                </div>
                                <div class="column columna2">
                                    <div class="field">
                                        <label class="label has-text-left">Apellido</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" name="apellido">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label has-text-left ">Cédula</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" name="cedula">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label has-text-left">Número de Contacto</label>
                                        <div class="control">
                                            <input class="input input-is" type="text" name="numero_contacto">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label has-text-left">Facultad</label>
                                        <div class="control">
                                            <div class="select is-fullwidth input-is">
                                                <select name="facultad">
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
                            <input class="button boton" type="submit" value="Registrarse">
                        </form>

                        <p class="sent">¿Ya tienes una cuenta? <a class="link" href="http://localhost:8000/iniciar_sesion.php"> Inicia Sesión</a></p>
                    </div>

                </div>
            </div>

        </div>

    </div>






</body>

</html>