<?php

// Incluimos todos los archivos
include "Cliente.php";
include "Moto.php";
include "Venta.php";
include "Empresa.php";

// 1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
$objCliente1 = new Cliente("Lautaro", "Barrera", false, "DNI", 41421435);
$objCliente2 = new Cliente("Pedro", "Lopez", false, "DNI", 22379188);

// 2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo.
$objMoto1 = new Moto (11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto (13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

// Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$empresa = new Empresa("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2] , [$objMoto1, $objMoto2, $objMoto3], []);

// 5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
// var_dump($empresa->registrarVenta([11,12,13], $objCliente2));

// 6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en elpunto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
// var_dump($empresa->registrarVenta([0], $objCliente2));

// 7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en elpunto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
// var_dump($empresa->registrarVenta([2], $objCliente2));

// Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento secorresponden con el tipo y número de documento del $objCliente1.
// var_dump($empresa->retornarVentasXCliente("DNI", 41421435));

// Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento secorresponden con el tipo y número de documento del $objCliente2
// var_dump($empresa->retornarVentasXCliente("DNI", 22379188));

echo $empresa;
