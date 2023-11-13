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
}