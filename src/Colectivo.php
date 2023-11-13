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
        if ($tarjeta->saldo - $tarjeta->costoBoleto < 0) {
            echo "<br> Saldo insuficiente, por favor recarge la tarjeta";
            return false;
        }
        else{
            $tarjeta->reducirSaldo($tarjeta->costoBoleto);
            return $tarjeta->saldo;
        }
    }

}
