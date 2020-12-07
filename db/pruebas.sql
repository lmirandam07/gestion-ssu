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
    contrasena,
    facultad
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
    '123',
    NULL
  ),
  (
    'Lionel',
    'Henríquez',
    '8-915-2155',NULL
    ,
    2,
    '6667777',
    'lio@gmail.com',
    '123',
    NULL
  ),
  (
    'Kirsten',
    'Chong',
    '8-953-1207',
    20,
    1,
    '6667777',
    'kirs@gmail.com',
    '123',
    1
  ),
  (
    'Alexander',
    'Herrera',
    '8-945-1151',
    15,
    1,
    '6667777',
    'alex@gmail.com',
    '123',
    4
  ),
  (
    'Javier',
    'Singh',
    '8-965-2155',NULL
    ,
    2,
    '6667777',
    'javi@gmail.com',
    '123',
    NULL
  );

  INSERT INTO propuesta_proyecto(nombre_pro,lugar_pro,fecha_pro,hora_inicio_pro,hora_final_pro,participantes_pro,descripcion_pro,objetivo_pro,materiales_pro,nombre_encarg,cedula_encarg,telefono_encarg,correo_encarg,perfil_estu_pro)
  VALUES('Mi pana','Zamora','2020-05-12','19:06:50','21:05:10',3,'Buen proyecto','Hacer un gran trabajo','Pico y pala','Hola','8-950-1232',651525,'hola@gmail.com','indice de 3');

  INSERT INTO proyecto(id_propuesta,nombre_pro,lugar_pro,fecha_pro,hora_inicio_pro,hora_final_pro,participantes_pro,descripcion_pro,objetivo_pro,materiales_pro,nombre_encarg,cedula_encarg,telefono_encarg,correo_encarg,perfil_estu_pro)
  VALUES('122','Mi pana','Zamora','2020-05-12','19:06:50','21:05:10',3,'Buen proyecto','Hacer un gran trabajo','Pico y pala','Hola','8-950-1232',651525,'hola@gmail.com','indice de 3');

  INSERT INTO proyecto_usuario(id_proyecto, id_usuario, horas_usuario)
  VALUES(12,8,10);

DROP TABLE ano;
DROP TABLE ano_proyecto;
DROP TABLE usuario;
DROP TABLE facultad;
DROP TABLE tipo_usuario;
DROP TABLE proyecto;
DROP TABLE propuesta_proyecto;
DROP TABLE estado_proyecto;
DROP TABLE facultad_propuesta;
DROP TABLE proyecto_usuario;

select * from proyecto_usuario where id_usuario = '3' AND id_proyecto='3';