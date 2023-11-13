<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{
    
    public function testCarga(){
    $tarjeta = new Tarjeta(0);
    $this->assertEquals($tarjera->cargarSaldo(6700), false);
    }
}