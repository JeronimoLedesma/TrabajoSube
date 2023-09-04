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

    public function pagarCon(Tarjeta $tarjeta){
        if ($tarjeta->saldo < 120){
            echo "No te queda suficiente saldo, prueba a cargar la tarjeta";
        }
        else{
            $tarjeta->bajarsaldo(120);
            $boleto = new Boleto($tarjeta->saldo, $this->linea);
            $boleto->muestra_boleto();
        }
    }
}