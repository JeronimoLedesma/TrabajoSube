<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class CompletaTest extends TestCase{

    public function testCompleta(){
        $tarjeta = new FranquiciaCompleta(250, 46216, "BEG");
        $tarjeta->hora = 15;
        $this->assertEquals($tarjeta->reducirSaldo(70000, "Comun"), true);
        $this->assertEquals($tarjeta->getSaldo(), 250);
    }

    public function testUsosCompleta(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "BEG");
        $tarjeta->hora = 15;
        $this->assertEquals($tarjeta->reducirSaldo(500, "Comun"), true);
        $this->assertEquals($tarjeta->getSaldo(), 0);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $this->assertEquals($tarjeta->reducirSaldo(500, "Comun"), true);
        $this->assertEquals($tarjeta->getSaldo(), 0);
        $this->assertEquals($tarjeta->viajesHoy, 2);
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), true);
        $this->assertEquals($tarjeta->getSaldo(), -120);
        $this->assertEquals($tarjeta->reducirSaldo(500, "Comun"), false);
        $tarjeta->ultimoDiaViaje = 1;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), true);
        $this->assertEquals($tarjeta->getSaldo(), -120);
    }

    public function testFindeCompleta(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "BEG");
        $tarjeta->dia = 3;
        $tarjeta->hora = 15;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), true);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->dia = 0;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->dia = 6;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
    }

    public function testDesHoraCompleta(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "BEG");
        $tarjeta->hora = 15;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), true);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->hora = 5;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
        $tarjeta->hora = 23;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Comun"), false);
        $this->assertEquals($tarjeta->viajesHoy, 1);
    }

    public function testJubilado(){
        $tarjeta = new FranquiciaCompleta(0, 46216, "Jubilado");
        $tarjeta->hora = 15;
        $tarjeta->viajesHoy = 4;
        $this->assertEquals($tarjeta->reducirSaldo(3000, "Comun"), true);
    }

    public function testTransbordoCompleta(){
        $tarjeta = new FranquiciaCompleta(500,46216, "BEG");
        $tarjeta->hora = 15;
        $tarjeta->pagadoALas = 14;
        $tarjeta->dia = 4;
        $tarjeta->viajesHoy = 4;
        $this->assertEquals($tarjeta->reducirSaldo(120,"Comun"),true);
        $this->assertEquals($tarjeta->getSaldo(),380);
        $tarjeta->pagadoALas = 15;
        $this->assertEquals($tarjeta->reducirSaldo(120, "Interubano") , true);
        $this->assertEquals($tarjeta->getSaldo(), 380);
    }
}