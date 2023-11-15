<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class CompletaTest extends TestCase{

    public function testCompleta(){
        $tarjeta = new FranquiciaCompleta(250, 46216, "BEG");
        $cole = new Colectivo(103);
        $this->assertEquals($tarjeta->reducirSaldo(70000, $cole), true);
        $this->assertEquals($tarjeta->getSaldo(), 250);
    }

    public function testUsosCompleta(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "BEG");
        $cole = new Colectivo(103);
        $this->assertEquals($tarjeta->reducirSaldo(500, $cole), true);
        $this->assertEquals($tarjeta->getSaldo(), 0);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $this->assertEquals($tarjeta->reducirSaldo(500, $cole), true);
        $this->assertEquals($tarjeta->getSaldo(), 0);
        $this->assertEquals($tarjeta->viajesHoy, 2);
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), true);
        $this->assertEquals($tarjeta->getSaldo(), -120);
        $this->assertEquals($tarjeta->reducirSaldo(500, $cole), false);
        $tarjeta->ultimoDiaViaje = 1;
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), true);
        $this->assertEquals($tarjeta->getSaldo(), -120);
    }

    public function testFindeCompleta(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "BEG");
        $cole = new Colectivo(103);
        $tarjeta->dia = 3;
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), true);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->dia = 0;
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->dia = 6;
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
    }

    public function testDesHoraCompleta(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "BEG");
        $cole = new Colectivo(103);
        $tarjeta->hora = 15;
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), true);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->hora = 5;
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->hora = 23;
        $this->assertEquals($tarjeta->reducirSaldo(120, $cole), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
    }

    public function testJubilado(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "Jubilado");
        $cole = new Colectivo(103);
        $tarjeta->hora = 15;
        $tarjeta->viajesHoy = 4;
        $this->assertEquals($tarjeta->reducirSaldo(3000, $cole), true);
    }
}