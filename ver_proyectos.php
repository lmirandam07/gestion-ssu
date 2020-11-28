<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/ver_proyectos.css">
    <title>Ver Proyectos</title>
</head>
<body>
    <?php include('./templates/header.html'); ?>
    <br><section class = "container is-fluid">
        <div class = "columns">
            <div class = "column"></div>
            <div class = "column is-11">
                <section class = "hero has-bg-img is-medium">
                    <div class = "hero-body"></div>
                    <div class = "hero-foot">
                        <div class = "container is-fluid">
                           <h1 class = "title has-text-white">
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