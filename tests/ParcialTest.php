<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ParcialTest extends TestCase{

    public function testParcial(){
        $tarjeta = new FranquciaParcial(500);
        $cole = new Colectivo(103);
        $cole->pagarCon($tarjeta);
        $this->assertEqual($tarjeta->getSaldo(), 440);
    }
}