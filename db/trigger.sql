# Trigger que inserta las propuestas aprobadas en la tabla de proyectos
CREATE TRIGGER generar_proyecto AFTER UPDATE ON propuesta_proyecto
FOR EACH ROW
BEGIN
    IF NEW.id_estado = 1 THEN
    INSERT INTO proyecto (nombre_pro, id_propuesta,lugar_pro, fecha_pro, hora_inicio_pro,
    hora_final_pro, participantes_pro, descripcion_pro, objetivo_pro, materiales_pro, nombre_encarg,
    cedula_encarg, telefono_encarg, correo_encarg, perfil_estu_pro)
    VALUES (NEW.nombre_pro, NEW.id_propuesta, new.lugar_pro, new.fecha_pro, NEW.hora_inicio_pro,
    NEW.hora_final_pro, NEW.participantes_pro, NEW.descripcion_pro, NEW.objetivo_pro, NEW.materiales_pro,
    NEW.nombre_encarg,NEW.cedula_encarg, NEW.telefono_encarg, NEW.correo_encarg, NEW.perfil_estu_pro);
    END IF;
END;

-- TRIGER ACTUALIZAR HORAS DE ESTUDIANTE

CREATE TRIGGER actualizar_horas_estudiante
AFTER
INSERT
  ON proyecto_usuario FOR EACH ROW BEGIN
SET
  @horas_proyecto =
(SELECT
  FORMAT(TIME_TO_SEC(TIMEDIFF(hora_final_pro, hora_inicio_pro)) / 3600,0) AS diferencia
FROM
  proyecto
WHERE
  id_proyecto = NEW.id_proyecto);

UPDATE
  usuario
SET
  total_horas = (total_horas + @horas_proyecto)
WHERE
  id_usuario = NEW.id_usuario;
END;

