<?php 
namespace TrabajoSube;
use PHPUnit\Framework\TestCase;

class TajetaTest extends TestCase{

    public function testPagarParcial(){
        $tarjeta = new FranquiciaParcial (120, 46210);
        $tiempo = new TiempoFake;
        $cole = new Colectivo (73);
        $cole->pagarCon($tarjeta, $tiempo);
        $this->assertEquals($tarjeta->getSaldo(), 60);
    }
}