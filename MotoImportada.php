<?php

class MotoImportada extends Moto {
    private $impuestoPorImportacion;
    private $paisOrigen;

    public function __construct(int $codigo, float $costo, int $anioFabricacion, string $descripcion, float $porcentajeIncrementoAnual, bool $activa, string $paisOrigen, float $impuestoPorImportacion){
        parent::__construct( $codigo,  $costo,  $anioFabricacion,  $descripcion,  $porcentajeIncrementoAnual,  $activa);
        $this->impuestoPorImportacion = $impuestoPorImportacion;
        $this->paisOrigen = $paisOrigen;
    }

    public function getImpuestoPorImportacion(){
        return $this->impuestoPorImportacion;
    }

    public function setImpuestoPorImportacion(float $value){
        $this->impuestoPorImportacion = $value;
    }

    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    public function setPaisOrigen(string $value){
        $this->paisOrigen = $value;
    }

    public function __toString(){
        $string = parent::__toString();
        $string .= "País de origen: " . $this->getPaisOrigen() . "\n";
        $string .= "Porcentaje de impuesto por importación: " . $this->getImpuestoPorImportacion() . "\n";
        return $string;
    }

    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        if ($precioVenta != -1){
            $precioVenta += $this->getImpuestoPorImportacion();
        }
        return $precioVenta;
    }
}