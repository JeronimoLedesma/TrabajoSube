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
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->getSaldo(), 440);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->getSaldo(), 380);
        $this->assertEquals($tarjeta->viajesHoy, 2);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->getSaldo(), 320);
        $this->assertEquals($tarjeta->viajesHoy, 3);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->getSaldo(), 260);
        $this->assertEquals($tarjeta->viajesHoy, 4);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->getSaldo(), 140);
        $tarjeta->ultimoDiaViaje = 0;
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $this->assertEquals($tarjeta->getSaldo(), 80);
        $this->assertEquals($tarjeta->reducirSaldo(120), false);
        $tarjeta->momentoPago = time()-300;
        $this->assertEquals($tarjeta->reducirSaldo(100), true);
    
    }

    public function testFindeParcial(){
        $tarjeta = new FranquiciaParcial(60, 46216);
        $tarjeta->dia = 3;
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->dia = 0;
        $this->assertEquals($tarjeta->reducirSaldo(120), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->dia = 6;
        $this->assertEquals($tarjeta->reducirSaldo(120), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
    }

    public function testDesHoraParcial(){
        $tarjeta = new FranquiciaParcial(60, 46216);
        $tarjeta->hora = 8;
        $this->assertEquals($tarjeta->reducirSaldo(120), true);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->hora = 3;
        $this->assertEquals($tarjeta->reducirSaldo(120), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->hora = 23; 
        $this->assertEquals($tarjeta->reducirSaldo(120), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
    }
}