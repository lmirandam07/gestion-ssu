<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/proyecto.css">
    <title>Inicio</title>
</head>
<body>
    <?php include('./templates/header.html'); ?>
    <div class="proyecto content">
        <div class="titulo columns is-vcentered">
            <div class="imagen column is-one-third">
                <img src="./img/playa.png" alt="" width="350">
            </div>
            <div class="descripcion column">
                <h1 class="is-large is-purple">Limpieza de Playas</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure molestiae odit tempore architecto sed ducimus sequi, 
                    consequuntur aspernatur perspiciatis, iusto esse ab explicabo eligendi nemo ipsam numquam 
                    impedit tenetur!</p>
            </div>
        </div>
        <div class="info1 columns">
            <div class="encargado column is-half">
                <h1 class="subtitle is-purple">Encargado del Proyecto</h1>
                <ul>
                    <li><strong>Nombre</strong>: Fernando López</li>
                    <li><strong>Cédula</strong>: 8-214-326</li>
                    <li><strong>Teléfono</strong>: 6654-2013</li>
                    <li><strong>Correo</strong>: fernando.lopez@utp.ac.pa</li>
                </ul>
            </div>
            <div class="objetivo column">
                <h1 class="subtitle is-purple">Objetivo</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua
            </p>
            </div>
        </div>
        <div class="info2 columns">
            <div class="perfil column is-half">
                <h1 class="subtitle is-purple">Perfil de Estudiante</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua
                </p>
                <ul>
                    <li><strong>Facultades</strong>: Sistemas Computacionales</li>
                    <li><strong>Año de Estudio</strong>: 3er y 4to año</li>
                </ul>
            </div>
            <div class="informacion column">
                <h1 class="subtitle is-purple">Información</h1>
                <ul>
                    <li><strong>Lugar</strong>: Punta Chame</li>
                    <li><strong>Fecha</strong>: 29/11/2020</li>
                    <li><strong>Hora de Inicio</strong>: 10:00 a.m</li>
                    <li><strong>Hora de Fin</strong>: 5:00 p.m</li>
                    <li><strong>Cantidad de estudiantes requeridos</strong>: 80</li>
                </ul>
            </div>
        </div>
        <div class="inscribirse content has-text-centered">
            <button class="button is-principal is-medium is-outlined">Inscribirse</button>
        </div>
            
    </div>
    <?php include('./templates/footer.html'); ?>
</body>
</html>