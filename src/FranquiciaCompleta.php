<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaCompleta extends Tarjeta{

    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->costoBoleto = 0;
        $this->tipo = "franquicia completa";
        $this->viajeshoy = 0;
        $this->momentoDePago = 0;
    }

    public function bajarsaldo($tiempo){
        if ($tiempo - $this->momentoDePago >= 86400) {
            $this->viajeshoy -= 1;
            if ($this->viajeshoy < 0) {
                $this->viajeshoy = 0;
            }
        } 
        if ($this->viajeshoy <= 2) {
            $this->saldo -= $this->costoBoleto;
            $this->momentoDePago = $tiempo;
            $this->viajeshoy += 1;
        }
        else {
            $this->saldo -= 120;
            $this->momentoDePago = $tiempo;
            $this->viajeshoy += 1;
        }
    }
}