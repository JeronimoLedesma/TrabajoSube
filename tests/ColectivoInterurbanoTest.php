<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoInterurbanoTest extends TestCase{
    public function testColectivoInterurbano(){
        $cole = new ColectivoInterurbano(103);
        $tarjeta = new Tarjeta(800, 46216);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), 500);
    }

    public function testInterurbanoParcial(){
        $cole = new ColectivoInterurbano(103);
        $tarjeta = new FranquiciaParcial(800, 46216);
        $tarjeta->hora = 15;
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), 650);
    }

    public function testInterurbanoCompleta(){
        $cole = new ColectivoInterurbano(103);
        $tarjeta = new FranquiciaCompleta(800, 46216, "BEG");
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), 800);
    }
}