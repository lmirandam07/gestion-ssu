<?php

require_once (__DIR__ . '/../Models/ProyectoModel.php');
use \PHPUnit\Framework\TestCase; 

class ProyectoModelTest extends TestCase {


    

    public function testObtenerDatosProyecto(){
        $mockDatosProyecto = $this->getMockBuilder('ProyectoModel')
                                        ->getMock();
        $mockDatosProyecto->expects($this->once())
            ->method('obtener_proyecto')
            ->with($this->equalTo(1))
            ->willReturn($this->returnValue([1,'Limpieza Playa','ayudemos al mar']));
        $mockDatosProyecto->obtener_proyecto(1);
    }

    public function testObtenerTotalProyectos(){
        $stub = $this->createMock(ProyectoModel::class);

        $stub->method('total_proyectos')
            ->willReturn(array(1,2));

        $this->assertCount(2, $stub->total_proyectos());
    }

    public function testTotalPaginas(){
        $stub = $this->createMock(ProyectoModel::class);
        $stub->method('total_paginas') ->willReturn(2);
        $this->assertSame(2, $stub->total_paginas());
    }





        


    public function proveedorEstudianteInscrito(){

        return[
            'Caso1' => ["correo"=>"alex@gmail.com","id_propuesta"=>3,True],
            'Caso2' => ["correo"=>"alexgmail.com","id_propuesta"=>3,False],
            'Caso3' => ["correo"=>"alex@gmail.com","id_propuesta"=>"uno",False]
        ];
        
        
    }
    /**
    * @dataProvider proveedorEstudianteInscrito
    */
    public function testEstudianteInscrito($datos1,$datos2,$resultado_esperado){
        $proyecto = new ProyectoModel();
        $this->assertEquals($resultado_esperado,$proyecto->estudiante_inscrito($datos1,$datos2));

    }

    
    public function testInformacionProyecto(){
        $mockInformacionProyecto = $this->getMockBuilder('ProyectoModel')
                                        ->getMock();
        $mockInformacionProyecto->expects($this->once())
            ->method('informacion_proyecto')
            ->with($this->equalTo(2))
            ->willReturn($this->returnValue([2,'Limpieza Playa',4,'Playa Venao','2020-12-20','13:00:00','15:00:00',50,'Limpieza profunda de playa Venao','Crear conciencia del cuido de las playas','Cartuchos','Carlos Hernandez','8-255-255',66994455,'carlos@gmail.com','Estudiantes comprometidos']));
        $mockInformacionProyecto->informacion_proyecto(2);
    }



    public function testInformacionAno(){
        $mockDatosAno = $this->getMockBuilder('ProyectoModel')
                                        ->getMock();
        $mockDatosAno->expects($this->once())
            ->method('ano_proyecto')
            ->with($this->equalTo(1))
            ->willReturn($this->returnValue([1,2]));
        $mockDatosAno->ano_proyecto(1);
    }

    public function testInformacionFacultad(){
        $mockDatosFacultad = $this->getMockBuilder('ProyectoModel')
                                        ->getMock();
        $mockDatosFacultad->expects($this->once())
            ->method('facultad_proyecto')
            ->with($this->equalTo(1))
            ->willReturn($this->returnValue([1,3,4]));
        $mockDatosFacultad->facultad_proyecto(1);
    }



}


