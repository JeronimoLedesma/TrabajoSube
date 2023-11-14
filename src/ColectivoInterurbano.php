<?php
namespace TrabajoSube;
use TrabajoSube\Colectivo;
class ColectivoInterurbano extends Colectivo{

    public function __construct($linea){
        parent::__construct($linea);
        $this->costoBoleto = 184;
    }
}