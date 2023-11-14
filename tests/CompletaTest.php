<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class CompletaTest extends TestCase{

    public function testCompleta(){
        $tarjeta = new FranquiciaCompleta(250, 46216);
        $cole = new Colectivo(103);
        $this->assertEquals($tarjeta->reducirSaldo(70000), true);
        $this->assertEquals($tarjeta->getSaldo(), 250);
    }

    public function testUsosCompleta(){
        $tarjeta = new FranquiciaCompleta(0, 46216);
        $this->assertEquals($tarjeta->reducirSaldo(500), true);
        $this->assertEquals($tarjeta->getSaldo(), 0);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $this->assertEquals($tarjeta->reducirSaldo(500), true);
        $this->assertEquals($tarjeta->getSaldo(), 0);
        $this->assertEquals($tarjeta->viajesHoy, 2);
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), -120);
        $this->assertEquals($tarjeta->reducirSaldo(500), false);
        $tarjeta->ultimoDiaViaje = strtotime("sunday");
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), -120);
    }
}