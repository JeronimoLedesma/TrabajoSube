<?php 
namespace TrabajoSube;
use PHPUnit\Framework\TestCase;

class TajetaTest extends TestCase{

    public function testPagarParcial(){
        $tarjeta = new FranquiciaParcial (120);
        $cole = new Colectivo (73);
        $cole->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->getSaldo(), 60);
    }
}