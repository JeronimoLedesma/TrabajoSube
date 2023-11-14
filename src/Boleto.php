<?php
namespace TrabajoSube;
class Boleto{
    protected $saldo_viaje;
    protected $linea_viaje;
    protected $tarjeta_ID;
    protected $tipoTarjeta;
    protected $tiempo;

    public function __construct($saldo_viaje, $linea_viaje, $tarjeta_ID, $tipoTarjeta){
        $this->saldo_viaje = $saldo_viaje;
        $this->linea_viaje = $linea_viaje;
        $this->tarjeta_ID = $tarjeta_ID;
        $this->tipoTarjeta = $tipoTarjeta;
        $this->tiempo = date("d/m/Y H:i:s");
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
    public function getTiempo(){
        return $this->tiempo;
    }
}