<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/ver_perfil.css">
    <link rel="stylesheet" href="./css/ver_proyectos.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <title>Ver Perfil</title>
</head>
<body>
<?php include('./templates/header.html'); ?>

<div class="hero is-fullheight is-primary">




            <div class="columns colprin">
                <div class="column is-two-fifths columna1 ">
                <i class="far fa-user-circle fa-8x is-vcentered"></i>
                        <i class="far fa-edit is-vcentered"></i>
                            <h1 class="has-text-centered">NOMBRE APELLIDO</h1>
                            <h3 class="has-text-centered">ESTUDIANTE</h3>
                <div class="columns ">
                    <div class="column is-half">
                   
                            <h3>FECHA DE NACIMIENTO</h3>
                            <H3>GÉNERO</H3>
                            <H3>FACULTAD</H3>
                            <H3>CORREO ELECTRONICO</H3>
                            <H3>TELÉFONO</H3>
                            <H3>CONTRASEÑA</H3>
                    </div>
                    <div class="column is-half columna1">
                            <h3>0 de Enero de 0000</h3>
                            <h3>Indefinido</h3>
                            <h3>Sistemas</h3>
                            <h3>nombredecorreo@correo.com</h3>
                            <h3>0000-0000</h3>
                            <h3>***********</h3>
                        </div>
                       
                            
                        </div>
                        
                </div>
                <div class="column is-three-fifths bod"></div>
              
            </div>
            <div class="column columna2"></div>
                </div>
            

    </div>


    <section class="container is-fluid" id="proyectos">
        <div class = "columns is-centered"> <!--Proyecto-->
            <div class = "column is-11">
                <div class="box">
                    <article class="media">
                      <div class="media-left">
                        <figure class="image is-128x128">
                          <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                      </div>
                      <div class="media-content" id="descrip">
                        <div class="content">
                            <h3 id="titulo">Limpieza de playas</h3>
                            <div class = "columns">
                                <div class = "column is-10">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                    </p>
                                </div>
                            </div>
                            <div class = "columns is-variable is-8-desktop">
                                <div class = "column is-2 is-offset-10">
                                    <button class="button is-dark is-hovered"> Ver más </button>
                                </div>
                            </div>
                        </div>
                      </div>
                    </article>
                  </div>
           </div>
        </div> <!--Final Proyecto-->
     </section>

     <section class="container is-fluid" id="proyectos">
        <div class = "columns is-centered"> <!--Proyecto-->
            <div class = "column is-11">
                <div class="box">
                    <article class="media">
                      <div class="media-left">
                        <figure class="image is-128x128">
                          <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                      </div>
                      <div class="media-content" id="descrip">
                        <div class="content">
                            <h3 id="titulo">Limpieza de playas</h3>
                            <div class = "columns">
                                <div class = "column is-10">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                    </p>
                                </div>
                            </div>
                            <div class = "columns is-variable is-8-desktop">
                                <div class = "column is-2 is-offset-10">
                                    <button class="button is-dark is-hovered"> Ver más </button>
                                </div>
                            </div>
                        </div>
                      </div>
                    </article>
                  </div>
           </div>
        </div> <!--Final Proyecto-->
     </section>






<?php include('./templates/footer.html'); ?>

    
</body>
</html>