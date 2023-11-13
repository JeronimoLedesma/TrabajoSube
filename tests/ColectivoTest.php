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
        $tarjeta = new Tarjeta(0);
        $this->assertEquals($cole->pagarCon($tarjeta), false);
        $tarjeta->cargarSaldo(300);
        $this->assertEquals($cole->pagarCon($tarjeta), 180);
    }
}