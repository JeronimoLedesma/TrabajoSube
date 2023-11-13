<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ParcialTest extends TestCase{

    public function testParcial(){
        $tarjeta = new FranquiciaParcial(500);
        $cole = new Colectivo(103);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), 440);
    }
}