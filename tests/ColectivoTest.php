<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase
{

    public function testGetlinea()
    {
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
    }

    public function testPagar()
    {
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(800, 46216);
        $this->assertEquals($tarjeta->getSaldo(), 680);
    }
}