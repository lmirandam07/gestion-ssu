USE ssu_db;
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
  descripcion_pro VARCHAR(300) NOT NULL,
  objetivo_pro VARCHAR(300) NOT NULL,
  materiales_pro VARCHAR(300) NOT NULL,
  nombre_encarg VARCHAR(50) NOT NULL,
  cedula_encarg VARCHAR(20) NOT NULL,
  telefono_encarg INT NOT NULL,
  correo_encarg VARCHAR(50) NOT NULL,
  id_estado INT NOT NULL,
  perfil_estu_pro VARCHAR(300) NOT NULL,
  CONSTRAINT pk_id_propuesta PRIMARY KEY (id_propuesta),
  CONSTRAINT fk_id_estado FOREIGN KEY (id_estado) REFERENCES estado_proyecto (id_estado_pro)
);
CREATE TABLE proyecto (
  id_proyecto INT AUTO_INCREMENT NOT NULL,
  nombre_pro VARCHAR(50) NOT NULL,
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
  total_horas INT,
  id_tipo_us INT NOT NULL,
  telefono INT NOT NULL,
  correo VARCHAR(50) NOT NULL,
  contrasena VARCHAR(20) NOT NULL,
  CONSTRAINT pk_id_us PRIMARY KEY (id_usuario),
  CONSTRAINT pk_id_tipo_us FOREIGN KEY (id_tipo_us) REFERENCES tipo_usuario(id_tipo_us)
)

-- Tablas precargadas

INSERT INTO facultad(id_facultad, nombre_facultad)
VALUES (1, 'Ing. Civil'),
VALUES (2, 'Ing. Mecánica'),
VALUES (3, 'Ing. Eléctrica'),
VALUES (4, 'Ing. Sistemas Computacionales'),
VALUES (5, 'Ing. Industrial'),
VALUES (6, 'Ciencias y Tecnología');

INSERT INTO estado_proyecto(id_estado_pro, estado_pro)
VALUES (1, 'Aprobado'),
VALUES (2, 'Rechazado'),
VALUES (3, 'En proceso'),


INSERT INTO tipo_usuario (id_tipo_us, tipo_usuario)
VALUES (1, 'estudiante'),
VALUES (2, 'administrador');

INSERT INTO ano(id_ano, ano_estudio)
VALUES (1, 'Primer año'),
VALUES (2, 'Segundo año'),
VALUES (3, 'Tercer año'),
VALUES (4, 'Cuarto año o más');
