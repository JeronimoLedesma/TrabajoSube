<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ParcialTest extends TestCase{

    public function testParcial(){
        $tarjeta = new FranquiciaParcial(500, 46216);
        $cole = new Colectivo(103);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), 440);
    }

    public function testUsosParcial(){
        $tarjeta = new FranquiciaParcial(500, 46216);
        $this->assertEquals($tarjeta->viajesHoy, 0);
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), 440);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), 380);
        $this->assertEquals($tarjeta->viajesHoy, 2);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), 320);
        $this->assertEquals($tarjeta->viajesHoy, 3);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), 260);
        $this->assertEquals($tarjeta->viajesHoy, 4);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), 140);
        $tarjeta->ultimoDiaViaje = strtotime("sunday");
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), true);
        $this->assertEquals($tarjeta->getSaldo(), 80);
        $this->assertEquals($tarjeta->viajesHoy, 0);
        $this->assertEquals($tarjeta->reducirSaldo($tarjeta->costoBoleto), false);
    
    }
}