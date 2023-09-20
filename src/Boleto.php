<?php
namespace TrabajoSube;
class Boleto{
    protected $saldo_de_viaje;
    protected $linea_de_viaje;
    protected $tipo_de_tajerta;
    protected $ID_tarjeta;
    protected $abonado;
    protected $fecha;

    public function __construct($saldo_de_viaje, $linea_de_viaje, $tipo_de_tajerta, $ID_tarjeta, $abonado){
        $this->saldo_de_viaje = $saldo_de_viaje;
        $this->linea_de_viaje = $linea_de_viaje;
        $this->tipo_de_tajerta = $tipo_de_tajerta;
        $this->ID_tarjeta = $ID_tarjeta;
        $this->abonado = $abonado;
        $this->fecha = time();
    }

    public function muestra_boleto(){
        echo "<br> Linea " .$this->linea_de_viaje ;
        echo "<br> Quedan $" .$this->saldo_de_viaje. " de saldo";
        if ($this->abonado > 0) {
            echo "<br> Abona saldo " .$this->abonado;
        } 
        else {
            echo "<br> No se abona saldo extra";
        }
        echo "tarjeta " .$this->ID_tarjeta;
        echo "Tarjeta de tipo " .$this->tipo_de_tajerta;
        echo date("d/m/Y H:i:s", $this->fecha);
    }
}