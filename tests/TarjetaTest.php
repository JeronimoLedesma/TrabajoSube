<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{
    
    public function testCarga(){
    $tarjeta = new Tarjeta(0);
    $this->assertEquals($tarjeta->getSaldo(), 0);
    $tarjeta->cargarSaldo(6700);
    $this->assertEquals($tarjeta->getSaldo(), 6600);
    $this->assertEquals($tarjeta->saldoSobrante, 100);
    $this->assertEquals($tarjeta->cargarSaldo(5), false);

    }
}