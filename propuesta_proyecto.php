<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/propuesta_proyecto.css">
    <script src="https://kit.fontawesome.com/e9fad0131d.js" crossorigin="anonymous"></script>
    <title>Propuesta</title>
</head>
<body>
    <?php include('./templates/header.html'); ?>
    <br>
    <section class = "container is-fluid">
        <div class = "columns">
            <div class = "column"></div>
            <div class = "column is-11">
                <section class = "hero has-bg-img is-medium">
                    <div class = "hero-body"></div>
                    <div class = "hero-foot">
                        <div class = "container is-fluid">
                           <h1 class = "title has-text-white">
                            Tu propio Proyecto de SSU
                           </h1>
                        </div>
                     </div>
                 </section>
           </div>
           <div class = "column"></div>
        </div>
     </section>

     <!--Formulario para la obtencion de los datos de la propuesta -->
    <section class="container is-fluid"> 
        <div class="columns">
            <div class="column"></div>
            <div class="column is-11">
                <div class="propuesta content" id="propuesta">
                    <form action="" method="POST" id="informacion_propuesta">
                        <div class="columns">
                            <div class="datos column is-half">
                                <h2>Información Personal</h2>
                                
                                    <ul>

                                        <div class="field is-horizontal">
                                            <div class="field-label">
                                                <li><label class="label is-small">Nombre: </label></li>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input class="input is-small" type="text" placeholder="" name="nombre_encargado" id="nombre_encargado">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="field is-horizontal">
                                            <div class="field-label">
                                                <li><label class="label is-small">Cédula: </label></li>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input class="input is-small" type="text" placeholder="" name="cedula" id="cedula">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="field is-horizontal">
                                            <div class="field-label">
                                                <li><label class="label is-small">Teléfono celular: </label></li>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input class="input is-small" type="text" placeholder="" name="telefono" id="telefono">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="field is-horizontal">
                                            <div class="field-label">
                                                <li><label class="label is-small">Correo Electrónico: </label></li>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input class="input is-small" type="email" placeholder="" name="correo" id="correo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                      


                                    </ul>




                                <br>
                                <br>
                                <fieldset id="datos_estudiante">
                                        <h2>Estudiantes</h2>
                                        <ul>
                                            <li><label for="perfil"><strong>Perfil de Estudiante: </strong></label></li>
                                            <br>
                                            <textarea name="perfil" id="perfil" cols="50" rows="4">
                                            </textarea>
                                            <br>
                                            <br>
                                            <li><label for=""><strong>Año de Estudio:</strong></label></li>
                                            <br>
                                            <div class="columns ano_estudio">
                                                <div class="column is-one-third">

                                                    <input type="checkbox" name="primer" id="periodo" value="primer">
                                                    <label for="primero"><strong>Primer Año</strong></label>
                                                    <br>
                                                    <input type="checkbox" name="tercer" id="periodo" value="tercero">
                                                    <label for="tercero"><strong>Tercer Año</strong></label>
                                                        
                                                </div>
                                                <div class="column">
                                                    <input type="checkbox" name="segundo" id="periodo" value="segundo">
                                                    <label for="segundo"><strong>Segundo Año</strong></label>
                                                    <br>
                                                    <input type="checkbox" name="cuarto" id="periodo" value="cuarto">                           
                                                    <label for="cuarto"><strong>Cuarto Año</strong></label>
                                                </div>
                                                        
                                            </div>                                                               

                                            <br>
                                            <li><label for="facultad"><strong>Facultades: </strong></label></li>
                                            <br>
                                            <div class="columns facultades">
                                                <div class="column is-one-third">
                                                    <input type="checkbox" name="civil" id="facultad" value="civil">
                                                    <label for="civil"><strong>F. Ing. Civil</strong></label>
                                                    <br>
                                                    <input type="checkbox" name="industrial" id="facultad" value="industrial">
                                                    <label for="industrial"><strong>F. Ing. Industrial</strong></label>
                                                    <br>
                                                    <input type="checkbox" name="mecanica" id="facultad" value="mecanica">
                                                    <label for="mecanica"><strong>F. Ing. Mecánica</strong></label>
                                                </div>
                                                <div class="column">
                                                    <input type="checkbox" name="electrica" id="facultad" value="electrica">
                                                    <label for="electrica"><strong>F. Ing. Eléctrica</strong></label>
                                                    <br>                                                             
                                                    <input type="checkbox" name="ciencias" id="facultad" value="ciencias">                           
                                                    <label for="cuarto"><strong>F. Ing. Ciencias y Tecnología</strong></label>
                                                    <br>
                                                    <input type="checkbox" name="sistemas" id="facultad" value="sistema">                           
                                                    <label for="sistema"><strong>F. Ing. Sistemas Computacionales</strong></label>
                                                </div>

                                            </div>
                                            
                                            

                                        </ul>
                                        
                                </fieldset>
                                    
                                    



                            </div>
                            <div class="column">
                                <h2>Tu Proyecto</h2>
                                <ul>

                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Nombre:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="text" placeholder="" name="nombre_proyecto" id="nombre_proyecto">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Lugar:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="text" placeholder="" name="lugar" id="lugar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Fecha:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="date" placeholder="" name="fecha" id="fecha">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is">Hora Inicio:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="datetime" placeholder="" name="hora_inicio" id="hora_inicio">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                      
                                    
                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label is-small">Hora Final:</label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="datetime" placeholder="" name="hora_final" id="hora_final">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                      


                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <li><label class="label">Cantidad de Estudiantes: </label></li>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <input class="input is-small" type="number" placeholder="" name="cantidad" id="cantidad">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                      

                                    <br>
                                    <li><label class="label">Descripción</label></li>
                                    <textarea name="descripcion" id="" cols="50" rows="4"></textarea>
                                    <br>
                                    <br>
                                    <li><label class="label">Objetivo</label></li>
                                    <textarea name="objetivo" id="" cols="50" rows="4"></textarea>
                                    <br>
                                    <br>
                                    <li><label class="label">Materiales</label></li>
                                    <textarea name="materiales" id="" cols="50" rows="4"></textarea>

                                </ul>

                                
                            
                            </div>
                        </div>
                        <br>
                        <div class="field is-grouped is-grouped-centered">
                            <p class="control">
                                <input type="submit" class="button is-second is-normal" value="RECHAZAR">
                            </p>
                            <p class="control">
                                <input type="submit" class="button is-principal is-normal" value="APROBAR">
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </section>
    
     <?php include('./templates/footer.html'); ?>
</body>
</html>