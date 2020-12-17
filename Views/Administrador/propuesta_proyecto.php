<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/propuesta_proyecto.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <title>Propuesta</title>
</head>

<body>
    <?php include('./Views/Layouts/header_usuario_admin.html'); ?>
    <br>
    <section class="container is-fluid">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-11">
                <section class="hero has-bg-img is-medium">
                    <div class="hero-body"></div>
                    <div class="hero-foot">
                        <div class="container is-fluid">
                            <h1 class="title has-text-white">
                                Tu propio Proyecto de SSU
                            </h1>
                        </div>
                    </div>
                </section>
            </div>
            <div class="column"></div>
        </div>
    </section>

    <!--Formulario para la obtencion de los datos de la propuesta -->
    <section class="container is-fluid">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-11">
                <div class="propuesta content" id="propuesta">
                    <?php
                    /*Ciclo for que va recorriendo el arreglo de Datos que viene desde el Controller de Propuesta
                    con todos los datos de la propuesta seleccionada para mostrarla en la pagina*/
                        foreach($datos as $dato){

                        
                    
                    ?>
                    <form action="" method="POST" id="informacion_propuesta">
                        <div class="columns">
                            <div class="datos column is-half">
                                <h2>Información Personal</h2>

                                <ul>
                                    <li><strong>Nombre Completo:</strong> <?php echo $dato['nombre_encarg']; ?></li>
                                    <br>
                                    <li><strong>Cédula:</strong> <?php echo $dato['cedula_encarg']; ?></strong></li>
                                    <br>
                                    <li><strong>Teléfono celular:</strong> <?php echo $dato['telefono_encarg']; ?></li>
                                    <br>
                                    <li><strong>Correo Electrónico:</strong> <?php echo $dato['correo_encarg']; ?></li>


                                </ul>




                                <br>
                                <br>
                                <fieldset id="datos_estudiante">
                                    <h2>Estudiantes</h2>
                                    <ul>
                                        <li><strong>Perfil de Estudiante: </strong></li>
                                            <p>
                                                <?php echo $dato['perfil_estu_pro']; ?>
                                            </p>
                                        <br>
                   
                   
                    <?php 
                        }
                        /*Ciclo for para almacenar los datos del arreglo anios que viene desde el Controller de 
                        Propuesta  para realizar condicionales con los valores que posee*/
                        $arr_anios = array();
                        $i = 0;
                        foreach($anios as $anio){
                            $arr_anios[$i] = $anio['id_ano'];
                            $i++;
                        }
                        
                    ?>
                
                                        <br>
                                        <li><label for=""><strong>Año de Estudio:</strong></label></li>
                                        <br>
                                        <div class="columns ano_estudio">
                                            <div class="column is-one-third">
                                            <?php
                                                /*Condicional que verifica si el año del checkbox existe en el 
                                                arreglo de los años de esa propuesta que se selecciona para 
                                                mostrar el checkbox checked o no*/
                                                if(in_array(1, $arr_anios)){
                                                    echo "
                                                    <input type='checkbox' name='anio_list[]' id='periodo' checked disabled>
                                                    <label for='primero'><strong>Primer Año</strong></label>
                                                    ";
                                                }
                                                else{
                                                    echo "
                                                    <input type='checkbox' name='anio_list[]' id='periodo' disabled>
                                                    <label for='primero'><strong>Primer Año</strong></label>
                                                    ";
                                                }
                                            
                                                if(in_array(3, $arr_anios)){
                                                    echo "
                                                    <br>
                                                    <input type='checkbox' name='anio_list[]' id='periodo'  checked disabled>
                                                    <label for='tercero'><strong>Tercer Año</strong></label>
                                                    ";
                                                }
                                                else{
                                                    echo "
                                                    <br>
                                                    <input type='checkbox' name='anio_list[]' id='periodo'  disabled>
                                                    <label for='tercero'><strong>Tercer Año</strong></label>
                                                    ";
                                                }
                                            ?>
                                                
                                            </div>
                                            <div class="column">
                                            <?php
                                                if(in_array(2, $arr_anios)){
                                                    echo "
                                                   
                                                    <input type='checkbox' name='anio_list[]' id='periodo'  checked disabled>
                                                    <label for='tercero'><strong>Segundo Año</strong></label>
                                                    ";
                                                }
                                                else{
                                                    echo "
                                                    <input type='checkbox' name='anio_list[]' id='periodo' disabled>
                                                    <label for='primero'><strong>Segundo Año</strong></label>
                                                    ";
                                                }
                                                echo "<br>";
                                                if(in_array(4, $arr_anios)){
                                                    echo "
                                                    
                                                    <input type='checkbox' name='anio_list[]' id='periodo'  checked disabled>
                                                    <label for='tercero'><strong>Cuarto año o mas</strong></label>
                                                    ";
                                                }
                                                else{
                                                    echo "
                                                    <input type='checkbox' name='anio_list[]' id='periodo' disabled>
                                                    <label for='primero'><strong>Cuarto año o mas Año</strong></label>
                                                    ";
                                                }
                                            ?>
                                            </div>

                                        </div>
 
                                       

                            <?php
                             /*Ciclo for para almacenar los datos del arreglo facultades que viene desde el Controller de 
                                Propuesta  para realizar condicionales con los valores que posee*/        
                                $arr_facultades = array();
                                $i = 0;
                                foreach($facultades as $facultad){
                                    $arr_facultades[$i] = $facultad['id_facultad'];
                                    $i++;
                                }        
                                        
                            ?>
                                             <br>
                                            <li><label for="facultad"><strong>Facultades: </strong></label></li>
                                            <br>
                                            <div class="columns facultades">
                                            <div class="column is-one-third">
                                                <?php
                                                /*Condicional que verifica si la facultad del checkbox existe en el 
                                                arreglo de los facultades de esa propuesta que se selecciona para 
                                                mostrar el checkbox checked o no*/
                                                    if(in_array(1,$arr_facultades)){
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' checked disabled>
                                                        <label for='civil'><strong>F. Ing. Civil</strong></label>
                                                        <br>
                                                        ";
                                                    }
                                                    else{
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' disabled>
                                                        <label for='civil'><strong>F. Ing. Civil</strong></label>
                                                        <br>                             
                                                        ";
                                                    }

                                                    if(in_array(5,$arr_facultades)){
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' checked disabled>
                                                        <label for='industrial'><strong>F. Ing. Industrial</strong></label>
                                                        <br>
                                                        ";                                                        
                                                    }
                                                    else{
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' disabled>
                                                        <label for='industrial'><strong>F. Ing. Industrial</strong></label>
                                                        <br>
                                                        ";
                                                    }

                                                    if(in_array(2,$arr_facultades)){
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' checked disabled>
                                                        <label for='mecanica'><strong>F. Ing. Mecánica</strong></label>
                                                        ";
                                                    }
                                                    else{
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' disabled>
                                                        <label for='mecanica'><strong>F. Ing. Mecánica</strong></label>
                                                        ";
                                                    }

                                                
                                                ?>
                                                
                                                
                                                
                                            </div>
                                            <div class="column">
                                                <?php
                                                    if(in_array(3,$arr_facultades)){

                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' checked disabled>
                                                        <label for='electrica'><strong>F. Ing. Eléctrica</strong></label>
                                                        <br>
                                                        
                                                        ";
                                                    }
                                                    else{
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' disabled>
                                                        <label for='electrica'><strong>F. Ing. Eléctrica</strong></label>
                                                        <br>
                                                        
                                                        ";
                                                    }

                                                    if(in_array(6,$arr_facultades)){
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' checked disabled>
                                                        <label for='cuarto'><strong>F. Ing. Ciencias y Tecnología</strong></label>
                                                        <br>
                                                        ";

                                                    }
                                                    else{
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' disabled>
                                                        <label for='cuarto'><strong>F. Ing. Ciencias y Tecnología</strong></label>
                                                        <br>
                                                        ";
                                                    }

                                                    if(in_array(4,$arr_facultades)){
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' checked disabled>
                                                        <label for='sistema'><strong>F. Ing. Sistemas Computacionales</strong></label>
                                                        ";
                                                    }
                                                    else{
                                                        echo"
                                                        <input type='checkbox' name='facultad_list[]' id='facultad' disabled>
                                                        <label for='sistema'><strong>F. Ing. Sistemas Computacionales</strong></label>
                                                        ";
                                                    }
                                                
                                                ?>
                                                
                                                
                                                
                                            </div>

                                        </div>



                                    </ul>

                                </fieldset>


                    <?php
                        foreach($datos as $dato){

                        
                    
                    ?>


                            </div>
                            <div class="column">
                                <h2>Tu Proyecto</h2>
                                <ul>                                   
                                    <li><strong>Nombre:</strong> <?php echo $dato['nombre_pro']; ?></li>
                                    <br>
                                    <li><strong>Lugar:</strong> <?php echo $dato['lugar_pro']; ?></li>
                                    <br>
                                    <li><strong>Fecha:</strong> <?php echo $dato['fecha_pro']; ?></li>
                                    <br>
                                    <li><strong>Hora Inicio:</strong> <?php echo $dato['hora_inicio_pro']; ?></li>
                                    <br>
                                    <li><strong>Hora Final:</strong> <?php echo $dato['hora_final_pro']; ?></li>
                                    <br>
                                    <li><strong>Cantidad de Estudiantes:</strong> <?php echo $dato['participantes_pro']; ?></li>
                                    <br>
                                    <li><strong>Descripción</strong></li>
                                    <p>
                                        <?php echo $dato['descripcion_pro']; ?>
                                    </p>
                                    <br>
                                    <br>
                                    <li><strong>Objetivo</strong></li>
                                    <p>
                                        <?php echo $dato['objetivo_pro']; ?>
                                    </p>
                                    <br>
                                    <br>
                                    <li><strong>Materiales</strong></li>
                                    <p>
                                        <?php echo $dato['materiales_pro']; ?>
                                    </p>

                                </ul>



                            </div>
                        </div>
                        <br>
                        
                    </form>
                    <?php 
                        /*Se obtiene el id de la propuesta que se muestra para enviarlo como atributo en el boton
                        para que se pueda aprobar o rechazar*/
                        $id_propuesta = $dato['id_propuesta'];
                    ?>
                        <div class="field is-grouped is-grouped-centered">
                            <p class="control">
                                <button class="button is-second is-normal" id="rechazar">RECHAZAR</button>
                                
                            </p>
                            <p class="control">
                                <?php echo"<a href='?controller=Aprobar&Propuesta=".$id_propuesta."' class='button is-principal is-normal'>APROBAR</a>";?>                               
                            </p>
                        </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </section>
    <div class="modal" id="modal">
        <div class="modal-background"></div>
        <?php echo"<form class='modal-card' action='?controller=Rechazar&Propuesta=".$id_propuesta."' method='POST'>"?>
            <header class="modal-card-head">
                <p class="modal-card-title">Motivo de rechazo</p>
                <a class="button" href="../../route.php?controller=Ver_Propuestas&Page=1" ><i class="fas fa-times"></i></a>
            </header>
            <section class="modal-card-body">
                <textarea class="textarea" name="motivo-rechazo"></textarea>
            </section>
            <footer class="modal-card-foot">
                <button class="button boton" type="submit">Enviar</button>
            </footer>
        </form>
    </div>

    <?php include('./Views/Layouts/footer_admin.html'); ?>
</body>
<script>
        const rechazar = document.getElementById("rechazar");
        const modal = document.getElementById("modal");
        rechazar.addEventListener('click', e => {
            modal.classList.add('is-active');
        });
</script>
</html>