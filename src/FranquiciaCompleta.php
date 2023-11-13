<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaCompleta extends Tarjeta
{
    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->costoBoleto = 0;
        $this->tipoTarjeta = "Boleto Gratuito";
    }

    public function reducirSaldo($cantidad){
        return true;
    }
}
