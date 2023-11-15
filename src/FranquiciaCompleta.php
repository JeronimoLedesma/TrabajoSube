<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaCompleta extends Tarjeta
{
    public $ultimoDiaViaje;
    public $viajesHoy;
    public $hora;
    public $dia;
    public $tipoGratuito;
    public function __construct($saldo, $ID, $tipoGratuito){
        parent::__construct($saldo, $ID);
        $this->tipoTarjeta = "Boleto Gratuito";
        $this->ultimoDiaViaje = date("w");
        $this->viajesHoy = 0;
        $this->hora = date("G");
        $this->dia = date("w");
        $this->tipoGratuito = $tipoGratuito;
    }

    public function reducirSaldo($cantidad){
    if($this->dia > 0 && $this->dia < 6 && $this->hora >= 6 && $this->hora <= 22){
        if($this->dia != $this->ultimoDiaViaje){
            $this->viajesHoy = 0;
            $this->diaUltimoViaje = date("w");
        }
        if ($this->viajesHoy < 2 || $this->tipoGratuito == "Jubilado") {
            $this->viajesHoy ++;
            return true;
        }
        elseif ($this->saldo - $cantidad >=-211.84 && $this->viajePlus < 2) {
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
    else{
        return false;
    }

    }
}
