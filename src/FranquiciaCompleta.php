<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaCompleta extends Tarjeta
{
    public function __construct($saldo){
        parent::__construct($saldo);
        $this->costoBoleto = 0;
    }

    public function reducirSaldo($cantidad){
        return true;
    }
}
