<?php

require_once (__DIR__.'/PropuestaModel');
use \PHPUnit\Framework\TestCase; 

class PropuestaModelTest extends TestCase {
    public function proveedorIngresarPropuesta() {
        return [
            
        ];
    }

    /**
     * @dataProvider proveedorIngresarPropuesta
     */

    public function testIngresarPropuesta() {
        $propuestaModel = new PropuestaModel();

    }
}