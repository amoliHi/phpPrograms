<?php

include "ComputerFactory.php";

$pc = ComputerFactory::getComputer("PC","2 GB","500 GB","2.4 GHz");
$server = ComputerFactory::getComputer("Server","16 GB","1 TB","2.9 GHz");
echo "Factory PC Config::";
print_r($pc);
echo "Factory Server Config::".
print_r($server);