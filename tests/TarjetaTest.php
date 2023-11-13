<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{
    
    public function testCarga(){
    $tarjeta = new Tarjeta(0);
    $tarjeta->cargarSaldo(6700);
    $this->assertEquals($tarjeta->saldo, 0);
    $tarjeta->cargarSaldo(300);
    $this->assertEquals($tarjeta->saldo, 0);
    }
}