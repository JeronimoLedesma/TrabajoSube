<?php
namespace TrabajoSube;
class Boleto{
    public $saldo_viaje;
    public $linea_viaje;

    public function __construct($saldo_viaje,  $linea_viaje){
        $this->saldo_viaje = $saldo_viaje;
        $this->linea_viaje = $linea_viaje;
    }
}