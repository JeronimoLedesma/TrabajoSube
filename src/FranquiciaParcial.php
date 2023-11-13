<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;

class FranquiciaParcial extends Tarjeta{

    public function __contruct($saldo){
        $this->saldo = $saldo;
        $this->costoBoleto = 180;
    }
}