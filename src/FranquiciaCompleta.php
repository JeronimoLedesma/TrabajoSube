<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaCompleta extends Tarjeta
{
    public $costoBoleto;
    public $saldo;
    public function __construct($saldo){
        $this->saldo = $saldo;
        $this->costoBoleto = 0;
    }

    public function reducirSaldo($cantidad){
        return true;
    }
}
