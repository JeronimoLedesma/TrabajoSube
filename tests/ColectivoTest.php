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
        $tarjeta->hora = 15;
        $tarjeta->dia = 3;
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), 615);
    }

    public function testPagarParcial(){
        $cole = new Colectivo(103);
        $tarjeta = new FranquiciaParcial(800,46216);
        $tarjeta->hora = 15;
        $tarjeta->dia = 3;
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(),707.5);
        }
}