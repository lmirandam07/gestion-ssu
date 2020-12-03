USE ssu_db;

INSERT INTO
  usuario(
    nombre_us,
    apellido_us,
    cedula_us,
    total_horas,
    id_tipo_us,
    telefono,
    correo,
    contrasena
  )
VALUES
  (
    'Luis',
    'Miranda',
    '8-954-208',NULL
    ,
    2,
    '6667777',
    'lu@gmail.com',
    '123'
  );
  (
    'Lionel',
    'Henríquez',
    '8-915-2155',NULL
    ,
    2,
    '6667777',
    'lio@gmail.com',
    '123'
  ),
  (
    'Kirsten',
    'Chong',
    '8-953-1207',
    20,
    1,
    '6667777',
    'kirs@gmail.com',
    '123'
  ),
  (
    'Alexander',
    'Herrera',
    '8-945-1151',
    15,
    1,
    '6667777',
    'alex@gmail.com',
    '123'
  ),
  (
    'Javier',
    'Singh',
    '8-965-2155',NULL
    ,
    2,
    '6667777',
    'javi@gmail.com',
    '123'
  );

  INSERT INTO propuesta_proyecto(nombre_pro,lugar_pro,fecha_pro,hora_inicio_pro,hora_final_pro,participantes_pro,descripcion_pro,objetivo_pro,materiales_pro,nombre_encarg,cedula_encarg,telefono_encarg,correo_encarg,perfil_estu_pro) 
  VALUES('Mi pana','Zamora','2020-05-12','19:06:50','21:05:10',3,'Buen proyecto','Hacer un gran trabajo','Pico y pala','Hola','8-950-1232',651525,'hola@gmail.com','indice de 3');