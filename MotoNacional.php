<?php

class MotoNacional extends Moto {
    private $porcentajeDescuento;

    public function __construct(int $codigo, float $costo, int $anioFabricacion, string $descripcion, float $porcentajeIncrementoAnual, bool $activa, float $porcentajeDescuento = 15){
        parent::__construct( $codigo,  $costo,  $anioFabricacion,  $descripcion,  $porcentajeIncrementoAnual,  $activa);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function getProcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento(float $value){
        $this->porcentajeDescuento = $value;
    }

    public function __toString(){
        $string = parent::__toString();
        $string .= "Porcentaje de descuento: " . $this->getProcentajeDescuento() . "\n";
        return $string;
    }

    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        if ($precioVenta != -1){
            $descuento = $precioVenta * $this->getProcentajeDescuento() / 100;
            $precioVenta -= $descuento;
        }
        return $precioVenta;
    }
}