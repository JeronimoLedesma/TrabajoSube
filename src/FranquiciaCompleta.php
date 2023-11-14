<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;
class FranquiciaCompleta extends Tarjeta
{
    public $ultimoDiaViaje;
    public $viajesHoy;
    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->costoBoleto = 120;
        $this->tipoTarjeta = "Boleto Gratuito";
        $this->ultimoDiaViaje = strtotime("today");
        $this->viajesHoy = 0;
    }

    public function reducirSaldo($cantidad){
        if(strtotime("today")-$this->ultimoDiaViaje != 0){
            $this->viajesHoy = 0;
            $this->ultimoDiaViaje = strtotime("today");
        }
        if ($this->viajesHoy < 2) {
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
}
