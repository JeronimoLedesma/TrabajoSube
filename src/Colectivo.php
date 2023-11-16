<?php
namespace TrabajoSube;
class Colectivo{
    
    public $linea;
    public $costoBoleto;
    public $tipoColectivo;
    
    public function __construct($linea){
        $this->linea = $linea;
        $this->costoBoleto = 185;
        $this->tipoColectivo = "Comun";
    }
    
    //    Funcion de ejemplo para test
    public function getLinea(){
        return $this->linea;
    }

    public function pagarCon($tarjeta){
        if ($tarjeta->reducirSaldo($this->costoBoleto, $this->tipoColectivo)){
            $boleto = new Boleto($tarjeta->saldo, $this->linea, $tarjeta->tarjetaID, $tarjeta->tipoTarjeta);
            return $boleto;
        }
        else {
            echo "\nSaldo insuficiente";
            return false;
        }
    }

}
