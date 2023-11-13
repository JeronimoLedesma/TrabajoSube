<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;

class FranquiciaParcial extends Tarjeta{
    
    public $costoBoleto;
    public $saldo;
    
    public function __contruct($saldo){
        $this->saldo = $saldo;
        $this->costoBoleto = 60;
    }
}