<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaCompleta extends Tarjeta{

    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->costoBoleto = 0;
        $this->tipo = "franquicia completa";
        $this->viajeshoy = 0;
    }

    public function bajarsaldo(){
        $this->saldo -= $this->costoBoleto;
    }
}