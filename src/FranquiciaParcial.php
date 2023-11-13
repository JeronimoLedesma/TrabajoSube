<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;

class FranquiciaParcial extends Tarjeta{

    public function __contruct($saldo){
        parent::__construct($saldo);
        $this->costoBoleto = 60;
    }
}