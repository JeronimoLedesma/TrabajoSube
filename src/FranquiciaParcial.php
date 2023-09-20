<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaParcial extends Tarjeta{

    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->costoBoleto = 60;
        $this->tipo = "franquicia parcial";
    }

    public function bajarsaldo(){
        $this->saldo -= $this->costoBoleto;
    }
}