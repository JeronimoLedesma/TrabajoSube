<?php
namespace TrabajoSube;
class Colectivo{
    
    public $linea;
    
    public function __construct($linea){
        $this->linea = $linea;
    }
    
    //    Funcion de ejemplo para test
    public function getLinea(){
        return $this->linea;
    }

    public function pagarCon($tarjeta){
        if ($tarjeta->reducirSaldo($tarjeta->costoBoleto)){
            $boleto = new Boleto($tarjeta->saldo, $this->linea, $tarjeta->tarjetaID, $tarjeta->tipoTarjeta);
            return $boleto;
        }
        else {
            echo "\nSaldo insuficiente";
            return false;
        }
    }

}
