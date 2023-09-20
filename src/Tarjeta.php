<?php
namespace TrabajoSube;
class Tarjeta{
    protected $saldo;
    protected $costoBoleto;
    protected $saldoExtra;
    protected $tipo;
    protected $ID;

    public function __construct($saldo, $ID){
        $this->saldo = $saldo;
        $this->costoBoleto = 120;
        $this->saldoExtra = 0;
        $this->tipo = "regular";
        $this->ID = $ID;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function cargarsaldo($cargar){
        $cantidades = array(150, 200, 250, 300, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
        if ($this->saldo + $cargar > 6600) {
            $this->saldoExtra += ($this->saldo + $cargar - 6600);
            $this->saldo = 6600;
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

    public function bajarsaldo(){
        $this->saldo -= $this->costoBoleto;
        if ($this->saldo < 6600) {
            $abono = 6600 - $this->saldo;
            $this->transferirDesdeSaldoExtra($abono);
        }
    }

    private function transferirDesdeSaldoExtra($cantidad) {
        $transferencia = min($cantidad, $this->saldoExtra);
        $this->saldo += $transferencia;
        $this->saldoExtra -= $transferencia;
    }
}
