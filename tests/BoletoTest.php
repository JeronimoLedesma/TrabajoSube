<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

    public function testBoleto(){
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(300, 46216);
        $boleto = $cole->pagarCon($tarjeta);
        $momento = date("d/m/Y H:i");
        $this->assertEquals($boleto->getSaldoBoleto(), $tarjeta->saldo);
        $this->assertEquals($boleto->getLineaBoleto(), $cole->linea);
        $this->assertEquals($boleto->getTipoTarjeta(), $tarjeta->tipoTarjeta);
        $this->assertEquals($boleto->getIDTarjera(), $tarjeta->tarjetaID);
        $this->assertEquals($boleto->getTiempo(), $momento);
    }
}