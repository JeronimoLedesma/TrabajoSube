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

    public function pagarCon($tarjeta){
        if ($tarjeta->saldo - $tarjeta->costoBoleto >= 0 || $tarjeta->puedeusarviajeplus){
            $tarjeta->bajarsaldo();
            $boleto = new Boleto($tarjeta->saldo, $this->linea);
            $boleto->muestra_boleto();
            if ($tarjeta->saldo < 0) {
                $tarjeta->viajesplus++;
            }
            return true;
        }
        else{
            echo "Saldo insuficiente y no le quedan oportunidades de viaje plus, por favor recargue su tarjeta";
            return false;
        }
    }
}
