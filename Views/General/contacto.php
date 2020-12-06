<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/contacto.css">
    <link rel="stylesheet" href="../../css/footer.css" />
    <title>Contacto</title>
</head>
<body>
    <?php
        try {
            if($_SESSION['tipo_usuario'] == 1) {
                include('../Layouts/header_usuario.html');
            } else if ($_SESSION['tipo_usuario'] == 2) {
                include('../Layouts/header_usuario_admin.html');
            } else {
                include('../Layouts/header.html');
            }
        } catch (Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }
    ?> 
   <div class="container level-item is-fluid container_titulo">
       <div>
            <h1 class= "has-text-centered is-size-3 has-text-weight-bold">¿Necesitas más información?</h1>
            <h2 class="has-text-centered is-size-3 has-text-weight-bold is-purple">Contáctanos</h2>
        </div>
   </div>
   <div class="is-fluid">
    <div class="columns is-gapless is-fluid">
            <div class="column is-half is-gapless container_morado level-item">
                    <div class="columns is-centered is-multiline">
                        <div class="column is-offset-12 is-gapless"></div>
                        <div class="column is-offset-12 is-gapless"></div>
                        <div class="column is-12">
                            <p class="has-text-centered is-size-3 has-text-weight-medium">Correos Electrónicos</p>
                        </div>
                            <div class="column is-half is-gapless">
                                <p class="has-text-centered level-item"><span class="icon"><i class="far fa-envelope"></i></span><span>servicio.social@utp.ac.pa</span></p>
                            </div>
                            <div class="column is-half is-gapless">
                                <p class="has-text-centered level-item"><span class="icon"><i class="far fa-envelope"></i></span><span>goldie.bravo@utp.ac.pa</span></p>
                            </div>
                            <div class="column is-half is-gapless">
                                <p class="has-text-centered level-item"><span class="icon"><i class="far fa-envelope"></i></span><span>ayansin.delacruz@utp.ac.pa</span></p>
                            </div>
                            <div class="column is-half is-gapless">
                                <p class="has-text-centered level-item"><span class="icon"><i class="far fa-envelope"></i></span><span>marjorie.franceschi@utp.ac.pa</span></p>
                            </div>
                        <div class="column is-offset-12 is-gapless"></div>
                        <div class="column is-offset-12 is-gapless"></div>
                        <div class="column is-offset-12 is-gapless"></div>
                    </div>
            </div>
        <div  class="column is-half is-gapless container_darkgray p-5">
                <div class="columns is-centered is-multiline">
                    <div class="column is-offset-12"></div>
                    <div class="column is-offset-12"></div>
                    <div class="column is-12">
                        <p class="has-text-centered is-size-3 has-text-weight-medium">Teléfonos</p>
                    </div class="has-text-centered">
                    <div class="column is-half is-gapless">
                        <p class="has-text-centered level-item"><span class="icon"><i class="fas fa-phone-alt mr-2"></i></span><span>(507) 560-3689</span></p>
                    </div>
                    <div class="column is-half is-gapless">
                        <p class="has-text-centered level-item"><span class="icon"><i class="fas fa-phone-alt mr-2"></i></span><span>(507) 560-3705</span></p>
                    </div>
                    <div class="column is-half is-gapless">
                        <p class="has-text-centered level-item"><span class="icon"><i class="fas fa-phone-alt mr-2"></i></span><span>(507) 560-3689</span></p>
                    </div>
                    <div class="column is-half is-gapless">
                        <p class="has-text-centered level-item"><span class="icon"><i class="fas fa-phone-alt mr-2"></i></span><span>(507) 560-3689</span></p>
                    </div>
                    <div class="column is-offset-12 is-gapless"></div>
                    <div class="column is-offset-12 is-gapless"></div>
                    <div class="column is-offset-12 is-gapless"></div>
                    </div>
        </div>
    </div>
   </div>
</div>
<?php
        try {

            if($_SESSION['tipo_usuario'] == 1) {
                include('../Layouts/footer_estu.html');
            } else if ($_SESSION['tipo_usuario'] == 2) {
                include('../Layouts/footer_admin.html');
            } else {
                include('../Layouts/footer.html');
            }
        } catch (Exception $e) {
            echo 'Error encontrado: ', $e->getMessage(), "\n";
        }
    ?>
</body>
</html>