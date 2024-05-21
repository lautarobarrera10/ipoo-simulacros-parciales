<?php

// Incluimos todos los archivos
include "Cliente.php";
include "Moto.php";
include "MotoNacional.php";
include "MotoImportada.php";
include "Venta.php";
include "Empresa.php";

// 1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new Cliente("Lautaro", "Barrera", false, "DNI", 41421435);
$objCliente2 = new Cliente("Pedro", "Lopez", false, "DNI", 22379188);

// 2. Cree 4 objetos Motos con la  información visualizada en las siguientes tablas: código, costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.
$objMoto11 = new MotoNacional (11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto12 = new MotoNacional (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto13 = new MotoNacional (13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
$objMoto14 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);


// Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”,  colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$empresa = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2] , [$objMoto11, $objMoto12, $objMoto13, $objMoto14], []);

// Invocar al método  registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.
echo $empresa->registrarVenta([11,12,13,14], $objCliente2) . "\n";

// Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [13,14].  Visualizar el resultado obtenido.
echo $empresa->registrarVenta([13,14], $objCliente2) . "\n";

// Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [14,2].  Visualizar el resultado obtenido.
echo $empresa->registrarVenta([14, 2], $objCliente2) . "\n";

// Invocar al método  informarVentasImportadas().  Visualizar el resultado obtenido
var_dump($empresa->informarVentasImportadas());

// Invocar al método  informarSumaVentasNacionales().  Visualizar el resultado obtenido.
echo $empresa->informarSumaVentasNacionales();

// Realizar un echo de la variable Empresa creada en 2.
echo $empresa;