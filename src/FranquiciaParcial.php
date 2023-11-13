<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;

class FranquiciaParcial extends Tarjeta{

    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->costoBoleto = 60;
        $this->tipoTarjeta = "Medio Boleto";
    }
}