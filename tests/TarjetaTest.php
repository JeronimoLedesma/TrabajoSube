<?php 
namespace TrabajoSube;
use PHPUnit\Framework\TestCase;

class TajetaTest extends TestCase{

    public function testPagarParcial(){
        $tarjeta = new FranquiciaParcial (600, 46210);
        $tiempo = new TiempoFake;
        $cole = new Colectivo (73);
        $cole->pagarCon($tarjeta, $tiempo);
        $this->assertEquals($tarjeta->getSaldo(), 540);
        $tiempo->avanzar(200);
        $cole->pagarCon($tarjeta, $tiempo);
        $this->assertEquals($tarjeta->getSaldo(), 420);
    }
}