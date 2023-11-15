<?php
namespace TrabajoSube;
class Colectivo{
    
    public $linea;
    public $costoBoleto;
    
    public function __construct($linea){
        $this->linea = $linea;
        $this->costoBoleto = 120;
    }
    
    //    Funcion de ejemplo para test
    public function getLinea(){
        return $this->linea;
    }

    public function pagarCon($tarjeta, $this){
        if ($tarjeta->reducirSaldo($this->costoBoleto)){
            $boleto = new Boleto($tarjeta->saldo, $this->linea, $tarjeta->tarjetaID, $tarjeta->tipoTarjeta);
            return $boleto;
        }
        else {
            echo "\nSaldo insuficiente";
            return false;
        }
    }

}
