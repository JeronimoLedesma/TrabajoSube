<?php
namespace TrabajoSube;
class Tarjeta{
    protected $saldo;

    public function __construct($saldo){
        $this->saldo = $saldo;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function cargarsaldo($cargar){
        $cantidades = array(150, 200, 250, 300, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
        if ($this->saldo + $cargar > 6600) {
            echo "<br> No puedes tener mas de 6600 en saldo, intenta cargar menos";
        }
        else{
            if (in_array($cargar, $cantidades, true)) {
                $this->saldo += $cargar;
            }
            else{
                echo "<br> Por favor elija una cantidad apropiada para cargar";
            }
        }
    }
}