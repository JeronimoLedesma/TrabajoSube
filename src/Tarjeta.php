<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;
    public $costoBoleto;
    public $viajePlus;

    public $saldoSobrante;

    public function __construct($saldo){
        $this->saldo = $saldo;
        $this->costoBoleto = 120;
        $this->viajePlus = 0;
        $this->saldoSobrante = 0;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function cargarSaldo($cantidad){
        $recargasPermitidas = array (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
        if ($this->saldo + $cantidad > 6600) {
            $this->saldoSobrante = $this->saldo + $cantidad - 6600;
            $this->saldo = 6600;
        }
        else if (in_array($cantidad, $recargasPermitidas, true)){
            $this->saldo = $this->saldo + $cantidad;
            if ($this->saldo > 0) {
                $this->viajePlus = 0;
            }
            return true;
        }
        else {
            echo "\nLa cantidad que se intenta cargar no se encuentra entre las permitidas";
            return false;
        }
    }

    public function reducirSaldo($cantidad){
        if ($this->saldo - $cantidad >=-211.84 && $this->viajePlus < 2) {
            $this->saldo = $this->saldo - $cantidad;
            if ($this->saldo < 6600) {
                $abono = 6600 - $this->saldo;
                $this->transferirSaldoSobrante($abono);
            }
            if ($this->saldo < 0) {
                $this->viajePlus ++;
            }
            return true;
        }
        else {
            return false;
        }
    }

    public function transferirSaldoSobrante($abono){
        $transferir = min($abono, $this->saldoSobrante);
        $this->saldo += $transferir;
        $this->saldoSobrante -= $transferir;
    }
    
}
