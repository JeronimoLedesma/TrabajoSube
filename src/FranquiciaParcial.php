<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;

class FranquiciaParcial extends Tarjeta{
    public $momentoPago;
    public $viajesHoy;
    public $modificador;
    
    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->tipoTarjeta = "Medio Boleto";
        $this->viajesHoy = 0;
        $this->momentoPago = time()-300;
        $this->modificador = 0.5;
    }

    public function reducirSaldo($cantidad, $colectivo){
    if($this->dia > 0 && $this->dia < 6 && $this->hora >= 6 && $this->hora <= 22){
        if ($this->colectivoUsado != $colectivo && $this->dia != 0 && (date("G")-$this->hora) < 1 && $this->hora <= 22 && $this->hora >= 7 && $this->colectivoUsado != "Ninguno") {
            $this->colectivoUsado = $colectivo;
            $this->hora = date("G");
            return true;
        }
        else {
            $this->colectivoUsado = $colectivo;
            $this->pagadoALas = date("G");
        }

        if($this->dia != $this->ultimoDiaViaje){
            $this->viajesHoy = 0;
            $this->modificador = 0.5;
            $this->ultimoDiaViaje = date("w");
        }
        else{
            $this->ultimoDiaViaje = date("w");
        }

        if($this->saldo - ($cantidad*$this->modificador) >= -211.84 && $this->viajePlus < 2 && (time()-$this->momentoPago) >= 300){
            if($this->viajesHoy < 4){
                $this->viajesHoy ++;
            }
            else{
                $this->modificador = 1;
            }
            $this->saldo -= $cantidad * $this->modificador;
            $this->momentoPago = time();
            if ($this->saldo < 6600) {
                $abono = 6600 - $this->saldo;
                $this->transferirSaldoSobrante($abono);
            }
            if ($this->saldo < 0) {
                $this->viajePlus ++;
            }
            return true;
        }
        else{
            return false;
        }
    }
    else {
        return false;
    }
    }
}