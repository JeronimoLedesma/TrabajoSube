<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;

class FranquiciaParcial extends Tarjeta{

    public function __construct($saldo){
        $this->saldo = $saldo;
        $this->costoBoleto = 60;
    }
}