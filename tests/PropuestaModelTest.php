<?php

require_once (__DIR__ . '/../Models/PropuestaModel.php');
use \PHPUnit\Framework\TestCase; 

class PropuestaModelTest extends TestCase {
    public function proveedorIngresarPropuesta() {
        return [
            'CP-001' => [True, ["nombre_pro" => "Limpieza de Playa", "lugar_pro" => "Cinta Costera", "fecha_pro" =>  "12/25/2020", "hora_inicio_pro" => "7:00", "hora_final_pro" => "21:00", "participantes_pro" => "50", "describ_pro" => "Limpiar cinta costera para contribuir con el ambiente", "objetivo_pro" => "Recoger toda la basura", "materiales_pro" => "Bolsas de basura y guantes", "nombe_encarg" => "Javier Singh", "cedula_encarg" => "3-567-123", "telefono_encarg" => "66761889", "correo" => "javier.singh@utp.ac.pa", "perfil_estu_pro" => "Estudiantes guapos"]]
        ];
    }

    /**
     * @dataProvider proveedorIngresarPropuesta
     */

    public function testIngresarPropuesta($resultado_esperado, $datos) {
        $propuestaModel = new PropuestaModel();

        $this->assertEquals($resultado_esperado, $propuestaModel->insertar_propuesta($datos));        

    }

    public function proveedorIngresarAnioFacultad() {
        return [
            'CP-001' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-002' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-003' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-004' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-005' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-006' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-007' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-008' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-009' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-010' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-011' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-012' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-013' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-014' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-015' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-016' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-017' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-018' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-019' => ["facultad"=>["1","3","4"], "anio"=>[]],
            'CP-020' => ["facultad"=>[], "anio"=>["1","2"]],
            'CP-021' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-022' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-023' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-024' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-025' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-026' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-027' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],
            'CP-028' => ["facultad"=>["1","3","4"], "anio"=>["1","2"]],

        ];
    }

    /**
     * @dataProvider proveedorIngresarAnioFacultad
     */
    public function testIngresarAnioFacultad() {
        $propuestaModel = new PropuestaModel();
    }

    
    public function proveedorRechazarPropuesta(){
       return [
           'CP-050' => [1, "Información Insuficiente", True],
           'CP-051' => [1, "Poco", False],
           'CP-052' => [1, "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nisi turpis, pretium quis dictum id, eleifend at justo. Cras dignissim tortor nec molestie mollis. Quisque dignissim blandit sapien, quis accumsan enim elementum ut. Donec venenatis velit erat, a vestibulum justo scelerisque et. Aliquam erat volutpat.", False],
           'CP-053' => [1, "", False]
       ];

    }
    
    /**
     * @dataProvider proveedorRechazarPropuesta
     */
    
     public function testRechazarPropuesta($id_propuesta, $motivo, $resultado_esperado){
        $propuestaModel =new PropuestaModel();
        $this->assertEquals($resultado_esperado, $propuestaModel->rechazar_propuesta($id_propuesta, $motivo)); 
         
     }
}