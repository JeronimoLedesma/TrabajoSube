<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;
    public $viajePlus;
    public $saldoSobrante;
    public $tarjetaID;
    public $tipoTarjeta;
    public $usosEnMes;
    public $mes;
    public $descuentoUsoFrecuente;
    public $ultimoDiaViaje;
    public $colectivoUsado;
    public $hora;
    public $dia;

    public function __construct($saldo, $ID){
        $this->saldo = $saldo;
        $this->viajePlus = 0;
        $this->saldoSobrante = 0;
        $this->tarjetaID = $ID;
        $this->tipoTarjeta = "Regular";
        $this->usosEnMes = 0;
        $this->mes = date("n");
        $this->descuentoUsoFrecuente = 1;
        $this->ultimoDiaViaje = date("w");
        $this->colectivoUsado = "Ninguno";
        $this->hora = date("G");
        $this->dia = date("w");
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function cargarSaldo($cantidad){
        $recargasPermitidas = array (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
        if (in_array($cantidad, $recargasPermitidas, true)){
            if ($this->saldo + $cantidad > 6600) {
                $this->saldoSobrante = $this->saldo + $cantidad - 6600;
                $this->saldo = 6600;
            }
            else{
                $this->saldo = $this->saldo + $cantidad;
            }
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

    public function reducirSaldo($cantidad, $colectivo)
    {   
        if ($this->colectivoUsado != $colectivo && $this->dia != 0 && date("G")-$this->hora < 1 && $this->hora <= 22 && $this->hora >= 7 && $this->colectivoUsado != "Ninguno") {
            $this->colectivoUsado = $colectivo;
            $this->hora = date("G");
            return true;
        }
        if ($this->saldo - ($cantidad*$this->descuentoUsoFrecuente) >=-211.84 && $this->viajePlus < 2) {
            if($this->mes != date("n")){
                $this->usosEnMes = 0;
                $this->usosEnMes++;
            }
            else{
                $this->usosEnMes++;
            }

            if($this->usosEnMes < 29){
                $this->descuentoUsoFrecuente = 1;
            }
            elseif($this->usosEnMes < 79){
                $this->descuentoUsoFrecuente = 0.8;
            }
            else{
                $this->descuentoUsoFrecuente = 0.75;
            }

            $this->saldo = $this->saldo - ($cantidad*$this->descuentoUsoFrecuente);

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
