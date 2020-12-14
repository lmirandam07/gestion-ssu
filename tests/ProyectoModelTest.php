<?php

require_once (__DIR__.'/ProyectoModel');
use \PHPUnit\Framework\TestCase; 

class ProyectoModelTest extends TestCase {

    public function Proveedor(){
        return[
            'Caso 1' => []
        ]
    }

    /**
    * @dataProvider Proveedor1
    */
    public function funcion1()
    {
        $Propuesta = new PropuestaModel();
       
    }

}
