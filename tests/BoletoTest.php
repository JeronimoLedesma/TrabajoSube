<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

    public function testBoleto(){
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(300, 46216);
        $boleto = $cole->pagarCon($tarjeta);
        $this->assertEquals($boleto->getSaldoBoleto(), $tarjeta->saldo);
        $this->assertEquals($boleto->getLineaBoleto(), $cole->linea);
        $this->assertEquals($boleto->getTipoTarjeta(), $tarjeta->tipoTarjeta);
        $this->assertEquals($boleto->getIDTarjera(), $tarjeta->tarjetaID);
    }
}