<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;
    public $costoBoleto;

    public function __construct($saldo){
        $this->saldo = $saldo;
        $this->costoBoleto = 120;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function cargarSaldo($cantidad){
        $recargasPermitidas = array (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
        if ($saldo + $cantidad > 6600) {
            echo "intento de recarga mayor a la maxima, intenta con una cantidad mas pequeña";
            return false;
        }
        else if (in_array($cantidad, $recargasPermitidas, true)){
            $this->saldo = $this->saldo + $cargar;
            return $this->saldo;
        }
        else {
            echo "La cantidad que se intenta cargar no se encuentra entre las permitidas";
            return false;
        }
    }
}
