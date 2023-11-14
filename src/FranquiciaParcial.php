<?php
namespace TrabajoSube;
use TrabajoSube\Tarjeta;

class FranquiciaParcial extends Tarjeta{
    public $momentoPago;
    public $diaUltimoViaje;
    public $viajesHoy;
    public $modificador;
    public function __construct($saldo, $ID){
        parent::__construct($saldo, $ID);
        $this->tipoTarjeta = "Medio Boleto";
        $this->viajesHoy = 0;
        $this->diaUltimoViaje = strtotime("today");
        $this->momentoPago = time()-300;
        $this->modificador = 0.5;
    }

    public function reducirSaldo($cantidad){
        if(strtotime("today")-$this->diaUltimoViaje != 0){
            $this->viajesHoy = 0;
            $this->modificador = 0.5;
            $this->diaUltimoViaje = strtotime("today");
        }

        if($this->saldo - $cantidad >= -211.84 && $this->viajePlus < 2 && (time()-$this->momentoPago) >= 300){
            if($this->viajesHoy < 3){
                $this->viajesHoy ++;
            }
            else{
                $this->costoBoleto = 1;
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
}