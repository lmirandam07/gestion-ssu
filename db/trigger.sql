CREATE TRIGGER generar_proyecto
AFTER
UPDATE
  ON propuesta_proyecto FOR EACH ROW BEGIN IF NEW.id_estado = 1 THEN
INSERT INTO
  proyecto (
    nombre_pro,
    id_propuesta,
    lugar_pro,
    fecha_pro,
    hora_inicio_pro,
    hora_final_pro,
    participantes_pro,
    descripcion_pro,
    objetivo_pro,
    materiales_pro,
    nombre_encarg,
    cedula_encarg,
    telefono_encarg,
    correo_encarg,
    perfil_estu_pro
  )
VALUES
  (
    NEW.nombre_pro,
    NEW.id_propuesta,
    new.lugar_pro,
    new.fecha_pro,
    NEW.hora_inicio_pro,
    NEW.hora_final_pro,
    NEW.participantes_pro,
    NEW.descripcion_pro,
    NEW.objetivo_pro,
    NEW.materiales_pro,
    NEW.nombre_encarg,
    NEW.cedula_encarg,
    NEW.telefono_encarg,
    NEW.correo_encarg,
    NEW.perfil_estu_pro
  );
END IF;
END;

CREATE TRIGGER disminuir_cantidad_estudiantes
AFTER INSERT 
ON proyecto_usuario FOR EACH ROW
BEGIN 
UPDATE 
  proyecto
SET 
  participantes_pro = (participantes_pro - 1)
WHERE
  id_proyecto = NEW.id_proyecto;
END;
