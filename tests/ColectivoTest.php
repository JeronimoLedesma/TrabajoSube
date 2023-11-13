<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{

    public function testGetlinea(){
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
    }

    public function testPagar(){
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(80);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), -40);
        $this->assertEquals($tarjeta->viajePlus, 1);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), -160);
        $this->assertEquals($tarjeta->viajePlus, 2);
        $this->assertEquals($cole->pagarCon($tarjeta), false);
        $tarjeta->cargarSaldo(200);
        $this->assertEquals($tarjeta->getSaldo(), 40);
        $this->assertEquals($tarjeta->viajePlus, 0);
    }
}