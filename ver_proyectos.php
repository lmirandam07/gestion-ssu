<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/ver_proyectos_propuestas.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Ver Proyecto</title>
</head>
<body>
    <?php include('./templates/header.html'); ?>
    <br><section class = "container is-fluid">
        <div class = "columns">
            <div class = "column"></div>
            <div class = "column is-11">
                <section class = "hero has-bg-img is-medium" id="banner_proyecto">
                    <div class = "hero-body"></div>
                    <div class = "hero-foot">
                        <div class = "container is-fluid">
                           <h1 class = "title has-text-white" id="titulo_pagina">
                            Proyectos de <br> Servicio Social Universitario
                           </h1>
                        </div>
                     </div>
                 </section>
           </div>
           <div class = "column"></div>
        </div>
     </section>
     <br>
     
     <section class="container is-fluid" id="propuestas">
        <div class = "columns is-centered"> <!--Proyecto-->
            <div class = "column is-11">
                <div class="box">
                    <article class="media">
                      <div class="media-left">
                      </div>
                      <div class="media-content" id="descrip">
                        <div class="content">
                            <div class = "columns is-gapless is-fluid is-multiline is-centered">
        
                                    <div class= "column is-gapless is-narrow">
                                        <figure class="image is-128x128" id="foto_proyecto">
                                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                                        </figure>
                                    </div>
                                    <div class = "column is-8 is-gapless">
                                        <h3 id="titulo">Limpieza de playas</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis. <br>
                                        </p>
                                    </div>
                                <div class = "column is-gapless"></div>
                                <div class = "column is-11 is-gapless"></div>
                                <div class = "column is-narrow is-gapless has-text-centered">
                                    <a href="./proyecto.php" class="button is-dark is-hovered" id="boton"> Ver más </a>
                                </div>
                            </div>
                        </div>
                      </div>
                    </article>
                  </div>
           </div>
        </div> <!--Final Proyecto-->
     </section>

     <br>

     <section class="container is-fluid">
        <div class = "columns is-centered"> 
            <div class = "column is-11">
                <nav class="pagination">
                    <a href="" class="pagination-previous" id="paginas" disabled>Anterior</a>
                    <a href="" class="pagination-next" id="paginas">Siguiente</a>
                    <ul class="pagination-list">
                        <li>
                            <a href="" class="pagination-link is-current" id="paginas">1</a>
                        </li>
                        <li>
                            <a href="" class="pagination-link" id="paginas">2</a>
                        </li>
                        <li>
                            <a href="" class="pagination-link" id="paginas">3</a>
                        </li>
                    </ul>
                </nav>
           </div>
        </div> 
     </section>
     <br>
     <?php include('./templates/footer.html'); ?>
</body>
</html>