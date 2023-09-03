<?php
namespace TrabajoSube;
class Boleto{
    protected $saldo_de_viaje;
    protected $linea_de_viaje;

    public function __construct($saldo_de_viaje, $linea_de_viaje){
        $this->saldo_de_viaje = $saldo_de_viaje;
        $this->linea_de_viaje = $linea_de_viaje;
    }

    public function muestra_boleto(){
        echo "<br> Linea" .$this->linea_de_viaje ;
        echo "<br> Quedan $" .$this->saldo_de_viaje. " de saldo"; 
    }
}