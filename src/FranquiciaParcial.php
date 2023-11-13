<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaParcial extends Tarjeta{

    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->costoBoleto = 60;
        $this->tipo = "franquicia parcial";
        $this->viajehoy = 0;
        $this->momentoDePago = 0;
    }

    public function bajarsaldo($tiempo){
        if ($tiempo - $this->momentoDePago >= 300 || $this->viajeshoy == 0) {
            if ($tiempo - $this->momentoDePago >= 86400) {
                $this->viajeshoy -= 1;
                if ($this->viajeshoy < 0) {
                    $this->viajeshoy = 0;
                }
            } 
            if ($this->viajeshoy <= 4) {
                $this->saldo -= $this->costoBoleto;
                $this->momentoDePago = $tiempo;
                $this->viajeshoy += 1;
                if ($this->saldo < 6600) {
                    $abono = 6600 - $this->saldo;
                    $this->transferirDesdeSaldoExtra($abono);
                }
            }
            else {
                $this->saldo -= 120;
                $this->momentoDePago = $tiempo;
                $this->viajeshoy += 1;
                if ($this->saldo < 6600) {
                    $abono = 6600 - $this->saldo;
                    $this->transferirDesdeSaldoExtra($abono);
                }
            }
        }
        else {
            $this->saldo -= 120;
            $this->momentoDePago = $tiempo;
            $this->viajeshoy += 1;
        }
        
}
}