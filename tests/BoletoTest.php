<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

    public function boletoTest(){
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(300);
        $boleto = $cole->pagarCon($tarjeta);
        $this->assertEquals($boleto->saldo_viaje, $tarjeta->saldo);
        $this->assertEquals($boleto->linea_viaje, $cole->linea);
    }
}