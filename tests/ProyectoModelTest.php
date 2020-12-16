<?php

require_once (__DIR__.'/ProyectoModel');
use \PHPUnit\Framework\TestCase; 

class ProyectoModelTest extends TestCase {

    /*public function proveedorObtenerProyectos(){
        return[
            'Caso ' => [1,"Limpieaza de playa","Ayudemos al mar.",[4]],
            'Caso 1' => ["id_proyecto"=>1,"nombre_pro"=>"Limpieza de playa","descripcion_pro"=>]
        ];
    }

    /**
    * @dataProvider proveedorObtenerProyectos
    */
   /* public function testObtenerProyectos($resultado_esperado,$page)
    { 
        $proyecto = new ProyectoModel();
        $this->assertEquals($resultado_esperado, $proyecto->obtener_proyecto($page));
       
    }*/

    public function testObtenerDatosProyectos(){
        $stub = $this->createMock(ProyectoModel::class);

        $stub->method('obtener_proyecto')
            ->willReturn(array($proyectos));
            


    }
    


    public function proveedorEstudianteInscrito(){

        return[
            'Caso1' => ["correo"=>"carlos@gmail.com","id_propuesta"=>2,True]
        ];
        
        
    }
    /**
    * @dataProvider proveedorEstudianteInscrito
    */
    public function testEstudianteInscrito($datos1,$datos2,$resultado_esperado){
        $proyecto = new ProyectoModel();
        $this->assertEquals($resultado_esperado,$proyecto->estudiante_inscrito($datos1,$datos2));

    }

}
