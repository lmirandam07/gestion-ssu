<?php


require_once (__DIR__ . '/../Models/PropuestaModel.php');
use \PHPUnit\Framework\TestCase; 

class PropuestaModelTest extends TestCase {
    public function proveedorIngresarPropuesta() {
        return [
            'CP-001' => [True, ["nombre_pro" => "Limpieza de Playa", "lugar_pro" => "Cinta Costera", "fecha_pro" =>  "2020-12-25", "hora_inicio_pro" => "7:00", "hora_final_pro" => "21:00", "participantes_pro" => "50", "describ_pro" => "Limpiar cinta costera para contribuir con el ambiente", "objetivo_pro" => "Recoger toda la basura", "materiales_pro" => "Bolsas de basura y guantes", "nombe_encarg" => "Javier Singh", "cedula_encarg" => "3-567-123", "telefono_encarg" => "66761889", "correo" => "javier.singh@utp.ac.pa", "perfil_estu_pro" => "Estudiantes guapos"]]
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
            'CP-001' => ["facultad"=>["1","3","4"], "anio"=>["1","2"],[3,2]],
            'CP-019' => ["facultad"=>["1","3","4"], "anio"=>[],[3,0]],
            'CP-020' => ["facultad"=>[], "anio"=>["1","2"],[0,2]]
        ];
    }

    /**
     * @dataProvider proveedorIngresarAnioFacultad
     */
    public function testIngresarAnioFacultad($datos1,$datos2,$resultado_esperado){
        $propuestaModel = new PropuestaModel();
        foreach($resultado_esperado as $resultado){
            $this->assertContains($resultado,$propuestaModel->insertar_facultad_anio_propuesta($datos1,$datos2));
        }

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