<?php

// En la clase Moto:
// 1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
// incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
// venta y false en caso contrario).
// 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
// clase.
// 3. Los métodos de acceso de cada uno de los atributos de la clase.
// 4. Redefinir el método toString para que retorne la información de los atributos de la clase.

class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct(int $codigo, float $costo, int $anioFabricacion, string $descripcion, float $porcentajeIncrementoAnual, bool $activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }
    

    
    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($value){
        $this->codigo = $value;
    }

    
    public function getCosto(){
        return $this->costo;
    }

    public function setCosto($value){
        $this->costo = $value;
    }

    
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }

    public function setAnioFabricacion($value){
        $this->anioFabricacion = $value;
    }

    
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($value){
        $this->descripcion = $value;
    }

    
    public function getPorcentajeIncrementoAnual(){
        return $this->porcentajeIncrementoAnual;
    }

    public function setPorcentajeIncrementoAnual($value){
        $this->porcentajeIncrementoAnual = $value;
    }

    
    public function getActiva(){
        return $this->activa;
    }

    public function setActiva($value){
        $this->activa = $value;
    }

    public function __toString(){
        $activa = $this->getActiva() ? "Sí" : "No";
        return
        "Código: " . $this->getCodigo() . "\n" .
        "Costo: $" . $this->getCosto() . "\n" .
        "Año de fabricación: " . $this->getAnioFabricacion() . "\n" .
        "Descripción: " . $this->getDescripcion() . "\n" .
        "Porcentaje de incremento anual: " . $this->getPorcentajeIncrementoAnual() . "%\n" .
        "Activa: " . $activa . "\n";
    }

    // 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto. Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo: $_venta = $_compra + $_compra * (anio * por_inc_anual) donde $_compra: es el costo de la moto. anio: cantidad de años transcurridos desde que se fabricó la moto. por_inc_anual: porcentaje de incremento anual de la moto
    public function darPrecioVenta(){
        $precioVenta = -1;

        if ($this->getActiva()){
            $anioActual = intval(date("Y"));
            $aniosTranscurridos = $anioActual - $this->getAnioFabricacion();
            $precioVenta = $this->getCosto() + $this->getCosto() * ($aniosTranscurridos * $this->getPorcentajeIncrementoAnual());
        }
        return $precioVenta;
    }
}