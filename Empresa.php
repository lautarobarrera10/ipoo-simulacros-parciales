<?php

// En la clase Empresa:
// 1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
// motos y la colección de ventas realizadas.
// 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
// 3. Los métodos de acceso para cada una de las variables instancias de la clase.
// 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.




class Empresa {
    private $denominacion;
    private $direccion;
    private $colObjClientes;
    private $colObjMotos;
    private $colObjVentas;

    public function __construct( string $denominacion, string $direccion, array $colObjClientes, array $colObjMotos, array $colObjVentas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colObjClientes = $colObjClientes;
        $this->colObjMotos = $colObjMotos;
        $this->colObjVentas = $colObjVentas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function setDenominacion($value){
        $this->denominacion = $value;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($value){
        $this->direccion = $value;
    }

    public function getObjClientes(){
        return $this->colObjClientes;
    }

    public function setObjClientes($value){
        $this->colObjClientes = $value;
    }

    public function getColObjMotos(){
        return $this->colObjMotos;
    }

    public function setColObjMotos($value){
        $this->colObjMotos = $value;
    }

    public function getColObjVentas(){
        return $this->colObjVentas;
    }

    public function setColObjVentas($value){
        $this->colObjVentas = $value;
    }

    public function __toString(){
        $clienteString = "";
        $motoString = "";
        $ventaString = "";

        foreach ($this->getObjClientes() as $cliente){
            $clienteString .= $cliente . "\n";
        }

        foreach ($this->getColObjMotos() as $moto){
            $motoString .= $moto . "\n";
        }

        foreach ($this->getColObjVentas() as $venta){
            $ventaString .= $venta . "\n";
        }

        return
        "Denominación: " . $this->getDenominacion() . "\n" .
        "Dirección: " . $this->getDireccion() . "\n" .
        "Clientes: " . $clienteString . "\n" .
        "Motos: " . $motoString . "\n" .
        "Ventas: " . $ventaString . "\n";
    }

    // 5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
    public function retornarMoto($codigoMoto){
        $colMotos = $this->getColObjMotos();
        $motoEncontrada  = null;
        $encontrada = false;
        $i = 0;
        while (!$encontrada && count($colMotos) > $i){
            if ($colMotos[$i]->getCodigo() == $codigoMoto){
                $encontrada = true;
                $motoEncontrada = $colMotos[$i];
            }
            $i++;
        }
        return $motoEncontrada;
    }

    // 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado. El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta.
    public function registrarVenta(array $colCodigosMoto, Cliente $objCliente){
        $importeFinal = 0;
        // Verificamos que el cliente no esté dado de baja
        if (!$objCliente->getDadoDeBaja()){
            // Creamos la venta
            $venta = new Venta(1, new DateTime(), $objCliente, []);
            // Recorremos los códigos de motos
            foreach ($colCodigosMoto as $codigoMoto){
                // Buscamos la moto con el código
                $moto = $this->retornarMoto($codigoMoto);
                // Si encontramos la moto
                if ($moto != null){
                    // La sumamos a la venta
                    $venta->incorporarMoto($moto);
                }
            }
            // Después de recorrer todos los códigos obtenemos el precio final
            $importeFinal = $venta->getPrecioFinal();
        } else {
            // Si el cliente está dado de baja retorna -1
            $importeFinal = -1;
        }
        return $importeFinal;
    }

    // 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
    public function retornarVentasXCliente(string $tipo, int $numDoc){
        // Array donde vamos a guardar las ventas
        $ventasCliente = [];
        // Buscamos el cliente
        $cliente = $this->buscarCliente($tipo, $numDoc);
        // Si encontramos el cliente
        if ($cliente != null){
            // Recorremos todas las ventas
            $colVentas = $this->getColObjVentas();
            foreach ($colVentas as $venta){
                // Verificamos si la venta es del cliente
                if ($cliente == $venta->getObjCliente()){
                    // Agregamos la venta al array
                    array_push($ventasCliente, $venta);
                }
            }
        }
        // Retornamos el array
        return $ventasCliente;
    }

    public function buscarCliente(string $tipo, int $numDoc){
        $colClientes = $this->getObjClientes();
        $clienteEncontrado = null;
        $encontrado = false;
        $i = 0;
        while (!$encontrado && count($colClientes) > $i){
            if ($colClientes[$i]->getTipoDocumento() == $tipo && $colClientes[$i]->getNumeroDocumento() == $numDoc){
                $encontrado = true;
                $clienteEncontrado = $colClientes[$i];
            }
            $i++;
        }
        return $clienteEncontrado;
    }

}