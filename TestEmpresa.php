<?php

// Incluimos todos los archivos
include "Cliente.php";
include "Moto.php";
include "Venta.php";
include "Empresa.php";

// 1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new Cliente("Lautaro", "Barrera", false, "DNI", 41421435);
$objCliente2 = new Cliente("Pedro", "Lopez", false, "DNI", 22379188);

// 2. Cree 4 objetos Motos con la  información visualizada en las siguientes tablas: código, costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.
$objMoto1 = new MotoNacional (11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new MotoNacional (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto3 = new MotoNacional (13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
$objMoto4 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);