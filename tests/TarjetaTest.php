<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{
    
    public function testCarga(){
    $tarjeta = new Tarjeta(0);
    $this->assertEquals($tarjeta->getSaldo(), 0);
    $tarjeta->cargarSaldo(6700);
    $this->assertEquals($tarjeta->getSaldo(), 0);
    $tarjeta->cargarSaldo(300);
    $this->assertEquals($tarjeta->getSaldo(), 300);
    $tarjeta->cargarSaldo(190);
    $this->assertEquals($tarjeta->saldo, 300);
    $this->assertEquals($tarjeta->cargarSaldo(5), false);

    }
}