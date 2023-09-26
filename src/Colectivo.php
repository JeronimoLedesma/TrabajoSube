<?php
namespace TrabajoSube;
class Colectivo{
    protected $linea;
    
    public function __construct($linea){
        $this->linea = $linea;
    }
    
    //    Funcion de ejemplo para test
    public function getLinea(){
        return $this->linea;
    }

    public function pagarCon($tarjeta, TiempoFake $hora){
        $abono = $tarjeta->saldoExtra;
        if ($tarjeta->saldo - $tarjeta->costoBoleto >= -211.84){
            if ($tarjeta->tipo == "regular") {
                $tarjeta->bajarsaldo();
            }
            else {
                $tarjeta->bajarsaldo($hora->tiempo);
            }
            $boleto = new Boleto($tarjeta->saldo, $this->linea, $tarjeta->tipo, $tarjeta->ID, ($abono - $tarjeta->saldoExtra));
            $boleto->muestra_boleto();
            return true;
        }
        else{
            echo "Saldo insuficiente y no le quedan oportunidades de viaje plus, por favor recargue su tarjeta";
            return false;
        }
    }
}
