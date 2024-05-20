<?php

// En la clase Cliente:
// 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
// documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
// 1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
// 2. Los métodos de acceso de cada uno de los atributos de la clase.
// 3. Redefinir el método _toString para que retorne la información de los atributos de la clase

class Cliente {
    private $nombre;
    private $apellido;
    private $dadoDeBaja; // Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct (string $nombre, string $apellido, bool $dadoDeBaja, string $tipoDocumento, int $numeroDocumento){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($value){
        $this->nombre = $value;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($value){
        $this->apellido = $value;
    }

    public function getDadoDeBaja(){
        return $this->dadoDeBaja;
    }

    public function setDadoDeBaja($value){
        $this->dadoDeBaja = $value;
    }
    
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($value){
        $this->tipoDocumento = $value;
    }

    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento($value){
        $this->numeroDocumento = $value;
    }

    public function __toString(){
        $dadoDeBaja = $this->getDadoDeBaja() ? "Sí" : "No";
        return
        "Nombre: " . $this->getNombre() . "\n" .
        "Apellido: " . $this->getApellido() . "\n" .
        "Dado de baja: " . $dadoDeBaja . "\n" .
        "Tipo de documento: " . $this->getTipoDocumento() . "\n" .
        "Número de documento: " . $this->getNumeroDocumento() . "\n";
    }
}