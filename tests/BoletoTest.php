<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

    public function mostrarBoletoTest(){
        $tarjeta = new Tarjeta(500);
        $cole = new Colectivo(103);
        $cole->pagarCon($tarjeta);
        $boleto = new Boleto ($tarjeta->saldo, $cole->linea);
    }
}