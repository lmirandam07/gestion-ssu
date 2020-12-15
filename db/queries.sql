USE ssu_db;
# Creacion de tablas para la base de datos
CREATE TABLE estado_proyecto (
  id_estado_pro INT NOT NULL,
  estado_pro VARCHAR(50) NOT NULL,
  CONSTRAINT pk_id_estado_pro PRIMARY KEY (id_estado_pro)
);
CREATE TABLE facultad (
  id_facultad INT NOT NULL,
  nombre_facultad VARCHAR(80) NOT NULL,
  CONSTRAINT pk_id_facultad PRIMARY KEY (id_facultad)
);
CREATE TABLE facultad_propuesta (
  id_propuesta INT NOT NULL,
  id_facultad INT NOT NULL,
  CONSTRAINT pk_id_propuesta_facultad PRIMARY KEY (id_propuesta, id_facultad)
);
CREATE TABLE propuesta_proyecto (
  id_propuesta INT AUTO_INCREMENT NOT NULL,
  nombre_pro VARCHAR(50) NOT NULL,
  lugar_pro VARCHAR(50) NOT NULL,
  fecha_pro DATE NOT NULL,
  hora_inicio_pro TIME NOT NULL,
  hora_final_pro TIME NOT NULL,
  participantes_pro INT NOT NULL,
  descripcion_pro VARCHAR(250) NOT NULL,
  objetivo_pro VARCHAR(250) NOT NULL,
  materiales_pro VARCHAR(250) NOT NULL,
  nombre_encarg VARCHAR(80) NOT NULL,
  cedula_encarg VARCHAR(20) NOT NULL,
  telefono_encarg INT NOT NULL,
  correo_encarg VARCHAR(50) NOT NULL,
  id_estado INT DEFAULT 3,
  perfil_estu_pro VARCHAR(250) NOT NULL,
  motivo_rechazo VARCHAR(250) DEFAULT NULL,
  CONSTRAINT pk_id_propuesta PRIMARY KEY (id_propuesta),
  CONSTRAINT fk_id_estado FOREIGN KEY (id_estado) REFERENCES estado_proyecto (id_estado_pro)
);
CREATE TABLE proyecto (
  id_proyecto INT AUTO_INCREMENT NOT NULL,
  nombre_pro VARCHAR(50) NOT NULL,
  id_propuesta INT NOT NULL,
  lugar_pro VARCHAR(50) NOT NULL,
  fecha_pro DATE NOT NULL,
  hora_inicio_pro TIME NOT NULL,
  hora_final_pro TIME NOT NULL,
  participantes_pro INT NOT NULL,
  descripcion_pro VARCHAR(300) NOT NULL,
  objetivo_pro VARCHAR(300) NOT NULL,
  materiales_pro VARCHAR(300) NOT NULL,
  nombre_encarg VARCHAR(50) NOT NULL,
  cedula_encarg VARCHAR(20) NOT NULL,
  telefono_encarg INT NOT NULL,
  correo_encarg VARCHAR(50) NOT NULL,
  perfil_estu_pro VARCHAR(300) NOT NULL,
  CONSTRAINT pk_id_pro PRIMARY KEY (id_proyecto),
  CONSTRAINT fk_id_propuesta FOREIGN KEY (id_propuesta) REFERENCES propuesta_proyecto (id_propuesta)
);
CREATE TABLE ano_proyecto (
  id_propuesta INT NOT NULL,
  id_ano INT NOT NULL,
  CONSTRAINT pk_prop_ano PRIMARY KEY (id_propuesta, id_ano)
);
CREATE TABLE ano (
  id_ano INT NOT NULL,
  ano_estudio VARCHAR(20) NOT NULL,
  CONSTRAINT pk_id_ano PRIMARY KEY (id_ano)
);
CREATE TABLE proyecto_usuario (
  id_proyecto INT NOT NULL,
  id_usuario INT NOT NULL,
  horas_usuario INT DEFAULT 0,
  CONSTRAINT pk_por_usuario PRIMARY KEY (id_proyecto, id_usuario)
);
CREATE TABLE tipo_usuario (
  id_tipo_us INT NOT NULL,
  tipo_usuario VARCHAR(50) NOT NULL,
  CONSTRAINT pk_id_tipo_us PRIMARY KEY (id_tipo_us)
);
CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT NOT NULL,
  nombre_us VARCHAR(50) NOT NULL,
  apellido_us VARCHAR(50) NOT NULL,
  cedula_us VARCHAR(20) NOT NULL,
  total_horas INT DEFAULT 0,
  id_tipo_us INT NOT NULL,
  telefono INT NOT NULL,
  correo VARCHAR(50) NOT NULL UNIQUE,
  contrasena VARCHAR(20) NOT NULL,
  facultad INT DEFAULT NULL,
  CONSTRAINT fk_facultad FOREIGN KEY(facultad) REFERENCES facultad(id_facultad),
  CONSTRAINT pk_id_us PRIMARY KEY (id_usuario),
  CONSTRAINT pk_id_tipo_us FOREIGN KEY (id_tipo_us) REFERENCES tipo_usuario(id_tipo_us)
);
# Insercion de algunos valores para contar con ciertos registros en el sistema
INSERT INTO
  facultad(id_facultad, nombre_facultad)
VALUES
  (1, 'Ing. Civil'),
  (2, 'Ing. Mecánica'),
  (3, 'Ing. Eléctrica'),
  (4, 'Ing. Sistemas Computacionales'),
  (5, 'Ing. Industrial'),
  (6, 'Ciencias y Tecnología');
INSERT INTO
  estado_proyecto(id_estado_pro, estado_pro)
VALUES
  (1, 'Aprobado'),
  (2, 'Rechazado'),
  (3, 'En proceso');
INSERT INTO
  tipo_usuario (id_tipo_us, tipo_usuario)
VALUES
  (1, 'estudiante'),
  (2, 'administrador');
INSERT INTO
  ano(id_ano, ano_estudio)
VALUES
  (1, 'Primer año'),
  (2, 'Segundo año'),
  (3, 'Tercer año'),
  (4, 'Cuarto año o más');


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
    'Usuario',
    'Estudiante',
    '8-888-888',0
    ,
    1,
    '6668888',
    'estu@utp.ac.pa',
    '123',
    3
  ),
  (
    'Usuario',
    'Admin',
    '7-777-777',NULL
    ,
    2,
    '6667777',
    'admin@utp.ac.pa',
    '123',
    NULL
  );
<<<<<<< HEAD


=======
>>>>>>> 15bf5c8dc93a310b12a4b446f8155a0fe656805b
