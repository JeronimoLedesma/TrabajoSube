<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{
    
    public function testCargaSobrante(){
    $tarjeta = new Tarjeta(0, 46216);
    $this->assertEquals($tarjeta->getSaldo(), 0);
    $tarjeta->cargarSaldo(6700);
    $this->assertEquals($tarjeta->getSaldo(), 6600);
    $this->assertEquals($tarjeta->saldoSobrante, 100);
    }

    public function testCargarfallo(){
    $tarjeta = new Tarjeta(0, 46216);
    $this->assertEquals($tarjeta->cargarSaldo(5), false);
    }

    public function testViajePlus(){
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(80,46216);
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

    public function testRecargaSobrante(){
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(6600, 46216);
        $tarjeta->cargarSaldo(220);
        $this->assertEquals($tarjeta->getSaldo(), 6600);
        $this->assertEquals($tarjeta->saldoSobrante,220);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->saldoSobrante,100);
        $this->assertEquals($tarjeta->getSaldo(), 6600);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->saldoSobrante, 0);
        $this->assertEquals($tarjeta->getSaldo(), 6580);
    }
}