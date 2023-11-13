<?php
namespace TrabajoSube;
class Boleto{
    public $saldo_viaje;
    public $linea_viaje;
    public $tarjeta_ID;
    public $tipoTarjeta;

    public function __construct($saldo_viaje, $linea_viaje, $tarjeta_ID, $tipoTarjeta){
        $this->saldo_viaje = $saldo_viaje;
        $this->linea_viaje = $linea_viaje;
        $this->tarjeta_ID = $tarjeta_ID;
        $this->tipoTarjeta = $tipoTarjeta;
    }

    public function getSaldoBoleto(){
        return $this->saldo_viaje;
    }

    public function getLineaBoleto(){
        return $this->linea_viaje;
    }

    public function getTipoTarjeta(){
        return $this->tipoTarjeta;
    }
    public function getIDTarjera(){
        return $this->tarjeta_ID;
    }
}