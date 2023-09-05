<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaParcial extends Tarjeta{

    public function __construct($saldo){
        parent::__construct($saldo);
        $this->costoBoleto = 60;
    }

    public function bajarsaldo(){
        $this->saldo -= $this->costoBoleto;
    }
}