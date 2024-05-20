<?php

// En la clase Venta:
// 1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
// motos y el precio final.
// 2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
// atributo de la clase.
// 3. Los métodos de acceso de cada uno de los atributos de la clase.
// 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.


class Venta {
    private $numero;
    private $fecha;
    private $objCliente;
    private $colObjMotos;
    private $precioFinal;

    public function __construct(int $numero, DateTime $fecha, Cliente $objCliente, array $colObjMotos, float $precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colObjMotos = $colObjMotos;
        $this->precioFinal = $this->calcularPrecioFinal($colObjMotos);
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($value){
        $this->numero = $value;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($value){
        $this->fecha = $value;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }

    public function setObjCliente($value){
        $this->objCliente = $value;
    }

    public function getColObjMotos(){
        return $this->colObjMotos;
    }

    public function setColObjMotos($value){
        $this->colObjMotos = $value;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setPrecioFinal($value){
        $this->precioFinal = $value;
    }

    public function __toString(){
        $motosString = "";
        foreach ($this->getColObjMotos() as $moto){
            $motosString .= $moto . "\n";
        }
        return
        "Número de venta: " . $this->getNumero() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Cliente: " . $this->getObjCliente() . "\n" .
        "Motos: " . $motosString . "\n" .
        "Precio final: " . $this->getPrecioFinal() . "\n";
    }

    // 5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta. Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
    public function incorporarMoto(Moto $objMoto){
        if ($objMoto->getActiva()){
            // Agregamos la moto
            $colMotos = $this->getColObjMotos();
            array_push($colMotos, $objMoto);
            $this->setColObjMotos($colMotos);

            // Sumamos el precio de la moto al precio final
            $precioFinal = $this->getPrecioFinal();
            $precioMoto = $objMoto->darPrecioVenta();
            $precioFinal += $precioMoto;
            $this->setPrecioFinal($precioFinal);
        }
    }

    private function calcularPrecioFinal(array $colMotos){
        $precioFinal = 0;
        foreach ($colMotos as $moto){
            $precioFinal += $moto->darPrecioVenta();
        }
        return $precioFinal;
    }
}