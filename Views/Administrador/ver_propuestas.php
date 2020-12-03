
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/ver_proyectos_propuestas.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
    <title>Ver Propuestas de Proyecto</title>
</head>
<body>
    <?php include('../Layouts/header_usuario_admin.html'); ?>
        <br><section class = "container is-fluid">
            <div class = "columns">
                <div class = "column"></div>
                <div class = "column is-11">
                    <section class = "hero has-bg-img is-medium">
                        <div class = "hero-body"></div>
                        <div class = "hero-foot">
                            <div class = "container is-fluid">
                            <h1 class = "title has-text-white" id="titulo_pagina">
                                Propuestas de Proyectos <br> de Servicio Social Universitario
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
<?php
// connect to database
$con = mysqli_connect('mysql','root','ssu12345', 'ssu_db');
mysqli_select_db($con, 'propuesta_proyecto');

// define how many results you want per page
$results_per_page = 5;

// find out the number of results stored in database
$sql='SELECT * FROM propuesta_proyecto';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql='SELECT nombre_pro, descripcion_pro FROM propuesta_proyecto LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);

?>

<section class="container is-fluid" id="propuestas">
<?php
    while($row = mysqli_fetch_array($result)) {
?>

<div class = "columns is-centered"> <!--Propuesta-->
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
                                                <h3 id="titulo"> <?php echo $row['nombre_pro']; ?> </h3>
                                                <p name="inicio" value="<?php $inicio ?>">
                                                    <?php echo $row['descripcion_pro']; ?><br>
                                                </p>
                                            </div>
                                        <div class = "column is-gapless"></div>
                                        <div class = "column is-11 is-gapless"></div>
                                        <div class = "column is-narrow is-gapless has-text-centered">
                                            <a href="../General/proyecto.php" class="button is-dark is-hovered" id="boton"> Ver más </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </article>
                        </div>
                </div>
</div> <!--Final Propuesta-->
<?php
}
?>
</section>

     <br>

     <section class="container is-fluid">
        <div class = "columns is-centered"> 
            <div class = "column is-11">
                <nav class="pagination">
                    <a href="" class="pagination-previous" id="paginas" disabled>Anterior</a>
                    <a href="" class="pagination-next" id="paginas">Siguiente</a>
                    <ul class="pagination-list">

<?php
for ($page=1;$page<=$number_of_pages;$page++) {
    ?>
<li>
                            <?php
                                echo "<a href='ver_propuestas.php?page=".$page."' class='pagination-link' id='paginas'>$page</a>";
                                
                            ?>
                        </li>

<?php
    }
?>
</ul>
                </nav>
           </div>
        </div> 
     </section>
     <br>
     <?php include('../Layouts/footer_admin.html'); ?>
</body>
</html> 
